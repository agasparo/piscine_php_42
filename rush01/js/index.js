window.onload = function() {
    var use_now;
    var etape = 0;
    var fin = 0;
    var game = new Audio('music/game.mp3');
    var already_use = new Array();
    var fl = 5;
    var al = 0;
    var nb_mort = 0;
    var rest_t = 0;
    var player = get_pass;
    alert('Le jeu vas commencer, bonne chance a toi');
    setTimeout(function(){
        $("#charge").fadeOut(1000);
            game.loop = true;
            game.play();
            all(1, 0);
    }, 3000);
    function all(joueur, evenement) {
        var is = is_finish();
        if (is == 1 || is == 2) {
            game.pause();
            var CheminComplet = document.location.href;
            var files = CheminComplet.substring(CheminComplet.lastIndexOf( "/" )+1 );
            if (is == 1) {
                if (player == 2)
                    window.location = "final_score.php?ids="+files+"&res=0&gg=2";
                else
                    window.location = "final_score.php?ids="+files+"&res=0&gg=1";
            } else {
                if (player == 1)
                    window.location = "final_score.php?ids="+files+"&res=0&gg=1";
                else
                    window.location = "final_score.php?ids="+files+"&res=0&gg=2";
            }
            return (0);
        }
        var vaisseau = document.querySelectorAll('.vaisseau');
        var i = 0;
        if (already_use.length == 0 && al == 0) {
            al = 1;
            if (joueur == player)
                $("#dammage").html("<h1 class='dam1'>C'est a toi de jouer</h1>");
            else
                $("#dammage").html("<h1 class='dam1'>C'est a ton adversaire de jouer</h1>");
            document.getElementById('dammage').style.display = 'block';
            setTimeout(function(){
                $("#dammage").hide();
            }, 3000);
        }
        console.log("-------------infos--------------");
        console.log('joueur : '+joueur+" (1 || 2)");
        console.log("nb vaisseaux : "+(fl - nb_mort)+" / 5");
        console.log("nb de vaisseaux joues : "+already_use.length+" / "+(fl - nb_mort));
        console.log("tab : "+already_use);
        console.log("fin du tour du vaisseaux : "+fin+" (0 || 1)");
        console.log("etape du tour du vaisseaux : "+etape+" / 2");
        console.log("---------------------------------");
        if (already_use.length >= (fl - nb_mort) && fin == 1) {
            rest_t++;
            al = 0;
            nb_mort = 0;
            already_use = [];
            if (joueur == 1)
                joueur = 2;
            else
                joueur = 1;
            fl = count(joueur);
            if (rest_t == 2) {
                rest_t = 0;
                reset_obj(1);
                reset_obj(2);
            }
            all(joueur, 0);
        }
        if (fin == 1) {
            fin = 0;
            all(joueur, 0);
        }
        fin = 0;
        reset_vide();
        reset_name();
        while (i < vaisseau.length) {
            vaisseau[i].addEventListener("contextmenu", do_s);
                if (evenement == 1) {
                var get_name = vaisseau[i].getAttribute('name');
                var wicht = get_name.substr(get_name.length - 1);
                if (wicht == joueur && vaisseau[i].getAttribute('name') == use_now) {
                    vaisseau[i].addEventListener("click", do_watch);
                }
                etape = 1;
            }
            if (evenement == 0) {
                var get_name = vaisseau[i].getAttribute('name');
                var wicht = get_name.substr(get_name.length - 1);
                if (wicht == joueur && already_use.indexOf(vaisseau[i].getAttribute('name')) == -1) {
                    vaisseau[i].addEventListener("click", do_pp);
                }
                etape = 0;
            }
            if (evenement == 2) {
                var get_name = vaisseau[i].getAttribute('name');
                var wicht = get_name.substr(get_name.length - 1);
                if (wicht == joueur && vaisseau[i].getAttribute('name') == use_now) {
                    vaisseau[i].addEventListener("click", attack);
                }
                etape = 2;
            }
            i++;
        }
        joue = joueur;
    }

    function do_pp(e) {
        tire_plus  = 0;
        var vaisseau = document.querySelectorAll('.vaisseau');
        var i = 0;
        while (i < vaisseau.length) {
            vaisseau[i].removeEventListener("click", do_pp);
            i++;
        }
        var is_ok = 0;
        if(e.clientY && e.clientX) {
            if (joue != player) {
                is_ok = 0;
            } else {
                is_ok = 1;
            }
        } else {
            is_ok = 1;
        }
        if (is_ok == 1) {
            var id = e.target.id;
            var name = document.getElementById(id).getAttribute('name');
            use_now = name;
            already_use[already_use.length] = name;
            $.post("get_bonus.php", {name:name}, function(data) {
                var infos = data.split(";");
                var vie = infos[0];
                var max_vie = infos[1];
                var pos_plus = 0;
                var tire_plus = 0;
                var pp = infos[2];
                $("#carac").html(
                    "<div align='center'>"+name+" : il te reste <font id='points'>"+pp+"</font> points a depenser</div>"+
                    "<div style='width: 50%;float: left;'>"+
                    "<br><br><font id='av'> 0 </font><button id='avance' class='btn'>+</button> Vitesse :"+
                    "<br><br><font id='bo'> 0 </font><button id='bouclier' class='btn'>+</button> Bouclier :"+
                    "<br><br><font id='ti'> 0 </font><button id='tire' class='btn'>+</button> Tire :"+
                    "<br><br><font id='vi'> 0 </font><button id='vie' class='btn'>+</button> Vie :"+
                    "</div>"+
                    "<div style='width: 40%;float: left;text-align: right;padding-right: 20px;'>"+
                    "<br><br><font id='av_plus'></font>"+
                    "<br><br>-"+
                    "<br><br><font id='ti_plus'></font>"+
                    "<br><br><font id='details_vie'></font>"+
                    "</div>"+
                    "<p id='valider' style='position: absolute; bottom: 5%; left: 45%; cursor:pointer;'>Valider</p>"
                    );
                $("#carac").show();
                if (joue == player) {
                    $('#details_vie').text(vie+" / "+max_vie);
                    $('#av_plus').text(pos_plus+" cases");
                    $('#ti_plus').text(tire_plus+" cases");
                } else {
                    $('#details_vie').text("??");
                    $('#av_plus').text("??");
                    $('#ti_plus').text("??");
                }
                document.getElementById('avance').onclick = function(e) {
                    var nb = parseInt($('#av').text());
                    if (joue == player || (e.clientX == 0 && e.clientY == 0)) {
                        if (pp > 0) {
                            nb++;
                            pp--;
                            var res = lancer();
                            pos_plus = pos_plus + res;
                            $('#av_plus').text(pos_plus+" cases");
                            $('#points').text(pp);
                            $('#av').text(" "+nb+" ");
                        }
                    }
                }
                document.getElementById('bouclier').onclick = function(e) {
                    var nb = parseInt($('#bo').text());
                    if (joue == player || (e.clientX == 0 && e.clientY == 0)) {
                        if (pp > 0) {
                            nb++;
                            pp--;
                            $('#points').text(pp);
                            $('#bo').text(" "+nb+" ");
                        } 
                    }
                }
                document.getElementById('tire').onclick = function(e) {
                    var nb = parseInt($('#ti').text());
                    if (joue == player || (e.clientX == 0 && e.clientY == 0)) {
                        if (pp > 0) {
                            nb++;
                            pp--;
                            var res = lancer();
                            tire_plus = tire_plus + res;
                            $('#ti_plus').text(tire_plus+" cases");
                            $('#points').text(pp);
                            $('#ti').text(" "+nb+" ");
                        }
                    }
                }
                var ok = 0;
                document.getElementById('vie').onclick = function(e) {
                    var nb = parseInt($('#vi').text());
                    if (joue == player || (e.clientX == 0 && e.clientY == 0)) {
                        if (pp > 0 && vie < max_vie) {
                            nb++;
                            pp--;
                            var res = lancer();
                            if (parseInt(res) == 6) {
                                vie = parseInt(vie) + 5;
                                $('#details_vie').text(vie+" / "+max_vie);
                                $('#vi').text(" "+nb+" ");
                            }
                            ok = 1;
                        }
                        $('#points').text(pp);
                    }
                }
                document.getElementById('valider').onclick = function(e) {
                    if (joue == player || (e.clientX == 0 && e.clientY == 0)) {
                        var bouclier = parseInt($('#bo').text()) * 5;
                        $.post("remp_bonus.php", {ok:ok, name:name, vie:vie, bouclier:bouclier, pos_plus:pos_plus, tire_plus:tire_plus, file:document.location.href}, function(data) {
                            console.log(data);
                            $("#carac").hide();
                            all(joue, 1);
                        });
                    }
                }
            });
        }
    }

    function attack(e) {
            var vaisseau = document.querySelectorAll('.vaisseau');
            var i = 0;
            while (i < vaisseau.length) {
                vaisseau[i].removeEventListener("click", attack);
                i++;
            }
            var is_ok = 0;
            if(e.clientY && e.clientX) {
                if (joue != player) {
                    is_ok = 0;
                } else {
                    is_ok = 1;
                }
            } else {
                is_ok = 1;
            }
            if (is_ok == 1) {
                id = e.target.id;
                name = document.getElementById(id).getAttribute('name');
                e.preventDefault();
                $.post("attack.php", {name:name}, function(data) {
                    name_att = name;
                    id_att = id;
                    var reset = document.querySelectorAll("td");
                    var z = 0;
                    while (z < reset.length) {
                        reset[z].classList.remove("go");
                        reset[z].classList.remove("att");
                        reset[z].classList.remove("cible");
                        reset[z].classList.remove("missile");
                        z++;
                    }
                    var tab = data.split(";");
                    var max_dep = tab[0];
                    var i = 0;
                    while (document.getElementById(id).getAttribute('class') == "vaisseau") {
                        var coord = id.split("x");
                        var x = coord[0] - 1;
                        id = x+"x"+coord[1];
                        if (document.getElementById(id) == null)
                            break;
                    }
                    var coord = id.split("x");
                    coord[0] = parseInt(coord[0]);
                    var x = coord[0] + 1;
                    id = x+"x"+coord[1];
                    while (document.getElementById(id).getAttribute('class') == "vaisseau") {
                        var coord = id.split("x");
                        var y = coord[1] - 1;
                        id = coord[0]+"x"+y;
                    }
                    var coord = id.split("x");
                    coord[1] = parseInt(coord[1]);
                    var y = coord[1] + 1;
                    id = coord[0]+"x"+y;

                    var deb = id;
                    var need = id;

                    var max = tab[1].split("x");
                    var coord = id.split("x");
                    coord[0] = parseInt(coord[0]);
                    var x = coord[0] + (max[0] - 1);
                    id = x+"x"+coord[1];
                    var test_max = need;
                    var ct = 0;
                    while (document.getElementById(test_max).getAttribute('class') == "vaisseau") {
                        var coord = test_max.split("x");
                        var y = parseInt(coord[1]) + 1;
                        test_max = coord[0]+"x"+y;
                        ct++;
                    }
                    if (ct == max[0]) {
                        var prem = max[0];
                        var deu = max[1];
                    } else {
                        var prem = max[1];
                        var deu = max[0];
                    }
                    var a = 0;
                    var tire_plus = 0;
                    $.post("get_bon.php", {sup:1, file:document.location.href}, function(data) {
                        var inf = data.split(';');
                        tire_plus = inf[1];
                        if (tire_plus == undefined)
                            tire_plus = 0;
                        console.log(tire_plus+" "+max_dep);
                        while (a < 4) {
                            if (a == 0) {
                                deb = dep_pos_left(deu, deb, parseInt(max_dep) + parseInt(tire_plus), 1);
                            } else if (a == 2) {
                                deb = dep_pos_bottom(deu, deb, parseInt(max_dep) + parseInt(tire_plus), 1);
                            } else if (a == 1) {
                                deb = dep_pos_right(prem, deb, parseInt(max_dep) + parseInt(tire_plus), 1);
                            } else if (a == 3) {
                                dep_pos_top(prem, deb, parseInt(max_dep) + parseInt(tire_plus), 1);
                            }
                            a++;
                        }
                        ct = prem;
                        var kill = document.querySelectorAll(".cible");
                        var z = 0;
                        while (z < kill.length) {
                            kill[z].addEventListener("click", kill_this);
                            z++;
                        }

                        $("body").append("<button id='no_tire' style='position: fixed; top: 5%; right: 5%; z-index: 200;'>Ne pas tirer</button>");

                        document.getElementById('no_tire').onclick = function(e) {
                            if (joue == player || (e.clientX == 0 && e.clientY == 0)) {
                                var deplace = document.querySelectorAll(".cible");
                                var z = 0;
                                while (z < deplace.length) {
                                    deplace[z].removeEventListener("click", kill_this);
                                    deplace[z].classList.remove("cible");
                                    deplace[z].classList.add("vaisseau");
                                    z++;
                                }
                                var supp = document.querySelectorAll(".att");
                                var i = 0;
                                while (i < supp.length) {
                                    supp[i].classList.remove("att");
                                    supp[i].classList.add("vide");
                                    i++;
                                }
                                document.getElementById('no_tire').remove();
                                fin = 1;
                                all(joue, 0);
                            }
                        }
                    });

                function kill_this(e) {
                    document.getElementById('no_tire').remove();
                    id = e.target.id;
                    name = document.getElementById(id).getAttribute('name');
                    var kill = document.querySelectorAll(".cible");
                    var z = 0;
                    while (z < kill.length) {
                        kill[z].removeEventListener("click", kill_this);
                        z++;
                    }
                    var is_ok = 0;
                    if(e.clientY && e.clientX) {
                        if (joue != player) {
                            is_ok = 0;
                        } else {
                            is_ok = 1;
                        }
                    } else {
                        is_ok = 1;
                    }
                    if (is_ok == 1) {
                        while (document.getElementById(id).getAttribute('class') == "vaisseau cible") {
                            var coord = id.split("x");
                            var y = coord[1] - 1;
                            id = coord[0]+"x"+y;
                        }
                        var id_req = id.split("x");
                        var id_att_req = id_att.split("x");
                        var sol = new Array();
                        if (Math.abs(parseInt(id_req[0]) - parseInt(id_att_req[0])) > Math.abs(parseInt(id_req[1]) - parseInt(id_att_req[1]))) {
                            if (parseInt(id_req[0]) > parseInt(id_att_req[0])) {
                            sol[0] = mis_top(sol, ct);
                            var coter = 'n';
                            } else {
                                sol[0] = mis_bot(sol, ct);
                                var coter = 's';
                            }
                        } else {
                            if (parseInt(id_req[1]) < parseInt(id_att_req[1])) {
                                sol[0] = mis_left(sol, ct);
                                var coter = 'e';
                            } else {
                                sol[0] = mis_right(sol, ct);
                                var coter = 'o';
                            }
                        }
                        if (sol.length > 0) {
                            att = document.getElementById(id_att).getAttribute('name');
                            $.post("dammage.php", {name:name, name_att:att}, function(data) {
                                var infos = data.split(";");
                                var tirreur = infos[0].split("\n");
                                var dire1 = tirreur[0].split(":");
                                var damma = -dire1[1];
                                if (infos[1] <= 0)
                                    var mort = 1;
                                var reset = document.querySelectorAll("td");
                                var z = 0;
                                while (z < reset.length) {
                                    reset[z].classList.remove("go");
                                    reset[z].classList.remove("att");
                                    reset[z].classList.remove("cible");
                                    z++;
                                }
                                if (coter == 'n') {
                                    id = check_top(sol);
                                } else if (coter == 's') {
                                    id = check_bot(sol);
                                } else if (coter == 'e') {
                                    id = check_left(sol);
                                } else {
                                    id = check_right(sol);
                                }
                                var coord = sol[0].split("x");
                                var x = parseInt(coord[0]);
                                var y = parseInt(coord[1]);
                                var id_x = id.split("x");
                                if (coter == 'n') {
                                    if (name.substr(name.length - 1) == joue && mort == 1) {
                                        if (already_use.indexOf(name) != -1) {
                                            var index = already_use.indexOf(name);
                                            already_use.splice(index, 1);
                                        }
                                        nb_mort++;
                                    }
                                    var id_des = (x - 1)+"x"+id_x[1];
                                    let timerId = setInterval(() => id_des = target_missile_top(sol, id_des), 50);
                                    setTimeout(() => { clearInterval(timerId); destroy(id, damma, mort, att); }, 50 * (id_x[0] - x));
                                } else if (coter == 's') {
                                    if (name.substr(name.length - 1) == joue && mort == 1) {
                                        if (already_use.indexOf(name) != -1) {
                                            var index = already_use.indexOf(name);
                                            already_use.splice(index, 1);
                                        }
                                        nb_mort++;
                                    }
                                    var id_des = (x + 1)+"x"+id_x[1];
                                    let timerId = setInterval(() => id_des = target_missile_bot(sol, id_des), 50);
                                    setTimeout(() => { clearInterval(timerId); destroy(id, damma, mort, att); }, 50 * (x - id_x[0]));
                                } else if (coter == 'e') {
                                    if (name.substr(name.length - 1) == joue && mort == 1) {
                                        if (already_use.indexOf(name) != -1) {
                                            var index = already_use.indexOf(name);
                                            already_use.splice(index, 1);
                                        }
                                        nb_mort++;
                                    }
                                    var id_des = id_x[0]+"x"+(y + 1);
                                    let timerId = setInterval(() => id_des = target_missile_left(sol, id_des), 50);
                                    setTimeout(() => { clearInterval(timerId); destroy(id, damma, mort, att); }, 50 * (y - id_x[1]));
                                } else {
                                    if (name.substr(name.length - 1) == joue && mort == 1) {
                                        if (already_use.indexOf(name) != -1) {
                                            var index = already_use.indexOf(name);
                                            already_use.splice(index, 1);
                                        }
                                        nb_mort++;
                                    }
                                    var id_des = id_x[0]+"x"+(y - 1);
                                    let timerId = setInterval(() => id_des = target_missile_right(sol, id_des), 50);
                                    setTimeout(() => { clearInterval(timerId); destroy(id, damma, mort, att); }, 50 * (id_x[1] - y));
                                }
                            });
                        }
                        fin = 1;
                        all(joue, 0);
                    }
                }
            });
        }
    }
    
    function do_s(event) {
        event.preventDefault();
        var vaisseau = document.querySelectorAll('.vaisseau');
        var i = 0;
        while (i < vaisseau.length) {
            vaisseau[i].removeEventListener("contextmenu", do_s);
            i++;
        }
        var is_ok = 0;
        if(event.clientY && event.clientX) {
            if (joue != player) {
                is_ok = 0;
            } else {
                is_ok = 1;
            }
        } else {
            is_ok = 1;
        }
        if (is_ok == 1) {
            id = event.target.id;
            name = document.getElementById(id).getAttribute('name');
            $.post("get_caract.php", {name:name}, function(data) {
                $("#carac").show();
                $("#carac").html(data);
                document.getElementById('close').onclick = function() {
                    $("#carac").hide();
                }
            });
            all(joue, etape);
        }
    }

    function do_watch(e) {
        var vaisseau = document.querySelectorAll('.vaisseau');
        var i = 0;
        while (i < vaisseau.length) {
            vaisseau[i].removeEventListener("click", do_watch);
            i++;
        }
        var is_ok = 0;
        if(e.clientY && e.clientX) {
            if (joue != player) {
                is_ok = 0;
            } else {
                is_ok = 1;
            }
        } else {
            is_ok = 1;
        }
        if (is_ok == 1) {
            console.log('ok');
            id = e.target.id;
            name = document.getElementById(id).getAttribute('name');
            $.post("deplacement.php", {name:name}, function(data) {
                var reset = document.querySelectorAll("td");
                var z = 0;
                while (z < reset.length) {
                    reset[z].classList.remove("go");
                    reset[z].classList.remove("att");
                    reset[z].classList.remove("cible");
                    reset[z].classList.remove("missile");
                    z++;
                }

                var tab = data.split(";");
                var max_dep = tab[0];
                var i = 0;
                while (document.getElementById(id).getAttribute('class') == "vaisseau") {
                    var coord = id.split("x");
                    var x = coord[0] - 1;
                    id = x+"x"+coord[1];
                    if (document.getElementById(id) == null)
                        break;
                }
                var coord = id.split("x");
                coord[0] = parseInt(coord[0]);
                var x = coord[0] + 1;
                id = x+"x"+coord[1];
                while (document.getElementById(id).getAttribute('class') == "vaisseau") {
                    var coord = id.split("x");
                    var y = coord[1] - 1;
                    id = coord[0]+"x"+y;
                }
                var coord = id.split("x");
                coord[1] = parseInt(coord[1]);
                var y = coord[1] + 1;
                id = coord[0]+"x"+y;

                var deb = id;
                var need = id;

                var max = tab[1].split("x");
                var coord = id.split("x");
                coord[0] = parseInt(coord[0]);
                var x = coord[0] + (max[0] - 1);
                id = x+"x"+coord[1];
                var test_max = need;
                var ct = 0;
                while (document.getElementById(test_max).getAttribute('class') == "vaisseau") {
                    var coord = test_max.split("x");
                    var y = parseInt(coord[1]) + 1;
                    test_max = coord[0]+"x"+y;
                    ct++;
                }
                if (ct == max[0]) {
                    var prem = max[0];
                    var deu = max[1];
                    var espace = 0;
                } else {
                    var prem = max[1];
                    var deu = max[0];
                    var espace = 1;
                }
                var a = 0;
                var tire_plus = 0;
                $.post("get_bon.php", {sup:0, file:document.location.href}, function(data) {
                    console.log(data);
                    var inf = data.split(';');
                    tire_plus = inf[0];
                    if (tire_plus == undefined)
                            tire_plus = 0;
                    console.log(tire_plus);
                    while (a < 4) {
                        if (a == 0) {
                            deb = dep_pos_left(deu, deb, parseInt(max_dep) + parseInt(tire_plus), 0);
                        } else if (a == 2) {
                            deb = dep_pos_bottom(deu, deb, parseInt(max_dep) + parseInt(tire_plus), 0);
                        } else if (a == 1) {
                            deb = dep_pos_right(prem, deb, parseInt(max_dep) + parseInt(tire_plus), 0);
                        } else if (a == 3) {
                            dep_pos_top(prem, deb, parseInt(max_dep) + parseInt(tire_plus), 0);
                        }
                        a++;
                    }
                    var deplace = document.querySelectorAll(".go");
                    var z = 0;
                    while (z < deplace.length) {
                        deplace[z].addEventListener("click", dep);
                        z++;
                    }

                    $("body").append("<button id='no_deplace' style='position: fixed; top: 5%; right: 5%; z-index: 200;'>Ne pas bouger</button>");

                    document.getElementById('no_deplace').onclick = function(e) {
                        if (joue == player || (e.clientX == 0 && e.clientY == 0)) {
                            var deplace = document.querySelectorAll(".go");
                            var z = 0;
                            while (z < deplace.length) {
                                deplace[z].removeEventListener("click", dep);
                                deplace[z].classList.remove("go");
                                deplace[z].classList.add("vide");
                                z++;
                            }
                            document.getElementById('no_deplace').remove();
                            all(joue, 2);
                        }
                    }
                });

                function dep(event) {
                    document.getElementById('no_deplace').remove();
                    id = event.target.id;
                    var deplace = document.querySelectorAll(".go");
                    var z = 0;
                    while (z < deplace.length) {
                        deplace[z].removeEventListener("click", dep);
                        z++;
                    }
                    var is_ok = 0;
                    if(e.clientY && e.clientX) {
                        if (joue != player) {
                            is_ok = 0;
                        } else {
                            is_ok = 1;
                        }
                    } else {
                        is_ok = 1;
                    }
                    if (is_ok == 1) {
                        if (document.getElementById(id).getAttribute('class') == 'go') {
                            var reset = document.querySelectorAll("td");
                            var z = 0;
                            while (z < reset.length) {
                                reset[z].classList.remove("go");
                                reset[z].classList.remove("att");
                                reset[z].classList.remove("cible");
                                reset[z].classList.remove("missile");
                                z++;
                            }
                            id_x = id.split("x");
                            id_t_x = need.split("x");
                            var diff_x = id_x[0] - id_t_x[0];
                            var diff_y = id_x[1] - id_t_x[1];
                            var coord = need.split("x");
                            var all_j = coord[1];
                            var turn = turn_is(id_t_x, id_x);
                            var de = 1;
                            turn = turn.split("x");
                            if (espace == 1) {
                                if (parseInt(id_x[1]) <= parseInt(turn[0])) {
                                    de = dep_left(max, need, diff_y, coord[1], coord[0], diff_x);
                                } else if (parseInt(id_x[1]) >= parseInt(turn[1])) {
                                    de = dep_left(max, need, diff_y, coord[1], coord[0], diff_x);
                                } else {
                                    if (diff_x > 0) {
                                        diff_x = parseInt(diff_x - max[0]) + 1;
                                        de = dep_bottom(max, need, diff_x, all_j);
                                    } else {
                                        de = dep_top(max, need, diff_x, all_j);
                                    }
                                }
                                if (de == 0) {
                                    if (already_use.indexOf(name) != -1) {
                                        var index = already_use.indexOf(name);
                                        already_use.splice(index, 1);
                                    }
                                    nb_mort++;
                                    fin = 1;
                                    all(joue, 0);
                                }
                            } else {
                                if (parseInt(id_x[1]) <= parseInt(turn[0])) {
                                    e = max[0];
                                    max[0] = max[1];
                                    max[1] = e;
                                    de = decale_y(diff_y, need, max);
                                } else if (parseInt(id_x[1]) >= parseInt(turn[1])) {
                                    e = max[0];
                                    max[0] = max[1];
                                    max[1] = e;
                                    de = decale_y(parseInt(diff_y - max[1]) + 1, need, max)
                                } else {
                                    if (diff_x > 0) {
                                        diff_x = parseInt(diff_x - max[0]) + 1;
                                        de = dep_in_left(max, need, diff_y, coord[1], coord[0], diff_x);
                                    } else {
                                        de = dep_in_right(max, need, diff_y, coord[1], coord[0], diff_x);
                                    }
                                }
                                if (de == 0) {
                                    if (already_use.indexOf(name) != -1) {
                                        var index = already_use.indexOf(name);
                                        already_use.splice(index, 1);
                                    }
                                    nb_mort++;
                                    fin = 1;
                                    all(joue, 0);
                                }
                            }
                        }
                        all(joue, 2);
                    }
                }
            });
        }
    }
}