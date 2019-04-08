var jo = document.getElementById("playeurs");
var profil = document.getElementById("co_ins");
var histo = document.getElementById("histo");
var conteneur = document.getElementById("content");

if (document.getElementById("no_co"))
    var to_pro = document.getElementById("no_co");
    
if (to_pro) {
    to_pro.onclick = function () {
        profil.click();
    }
}

profil.onclick = function() {
    profil.classList.add("hovers");
    jo.classList.remove("hovers");
    histo.classList.remove("hovers");
    $.post("js_in/search.php", {demande:"profil"}, function(data) {
        conteneur.innerHTML = "";
        conteneur.innerHTML = data;
        var file_up = document.getElementById('file_up');
        var file_sub_up = document.getElementById('sub_up');
        if (file_up) {
            file_sub_up.onclick = function (e) {
                    e.preventDefault();
                    var fReader = new FileReader();
                    fReader.readAsDataURL(file_up.files[0]);
                    fReader.onloadend = function(event){
                        var img = document.getElementById("result_img_user");
                        var ex = file_up.files[0].name.split('.');
                        if (ex[1] == 'jpg' || ex[1] == 'jpeg' || ex[1] == 'gif' || ex[1] == 'png') {
                            $.post("membres/photos.php", {link:event.target.result}, function(data) {
                                console.log(data);
                                location.reload();
                            });
                        }
                    }
            }
            file_up.onchange = function() {
                var fReader = new FileReader();
                fReader.readAsDataURL(file_up.files[0]);
                fReader.onloadend = function(event){
                    var img = document.getElementById("result_img_user");
                    var ex = file_up.files[0].name.split('.');
                    if (ex[1] == 'jpg' || ex[1] == 'jpeg' || ex[1] == 'gif' || ex[1] == 'png')
                        img.src = event.target.result;
                }
            }
        }
        if (document.getElementById("coco")) {
            document.getElementById("coco").onclick = function(e) {
                e.preventDefault();
        		var mail = $("#mail_connect").val();
        		var mdp = $("#mdp_connect").val();
        		$.post("membres/connection.php", {mail:mail, mdp:mdp}, function(data) {
        			if (data == "reussi")
        				location.reload();
        			else
        				$("#faute_co").html(data);
        		});
            }
        }
        if (document.getElementById("ins")) {
            document.getElementById("ins").onclick = function(e) {
                e.preventDefault();
                var pseudo = $("#pseudo_ins").val();
        		var mail = $("#mail_ins").val();
        		var mdp1 = $("#mdp_ins").val();
        		var mdp2 = $("#mdp_re_ins").val();
        		$.post("membres/inscription.php", {pseudo:pseudo, mail:mail, mdp1:mdp1, mdp2:mdp2}, function(data) {
        			$("#faute_ins").html(data);
        		});
            }
        }
        var loot_pro = document.querySelectorAll('.img_loot');
        var i = 0;
        while (i < loot_pro.length) {
            loot_pro[i].removeEventListener("mouseout", hide_loot);
            loot_pro[i].removeEventListener("mouseover", show_loot);
            loot_pro[i].addEventListener("mouseover", show_loot);
            loot_pro[i].addEventListener("mouseout", hide_loot);
            i++;
        }
        
        function show_loot(e) {
            document.getElementById('show_loot_user').style.display = "block";
            document.getElementById('show_loot_user').style.left = e.clientX - document.getElementById('show_loot_user').offsetWidth - 20;
            document.getElementById('show_loot_user').style.top = e.clientY - document.getElementById('show_loot_user').offsetHeight - 20;
            document.getElementById('img_show_loot_user').src = e.target.src;
            var name = e.target.src.split("/");
            name = name[name.length - 1];
            name = name.replace(/%20/gi, " ");
            name = name.split(".");
            name = name[0];
            var text;
            if (name == "Lance de Telesto") {
                text = "cet objet legendaire a 1 chance sur 1000 d'etre looter. Vous devez attendre au minumun une semaine avant de le vendre sur le marcher de la communaute.<br>Prix : <font color='orange'>1000 euros</font>";
           } else {
                text = "cet objet rare a 4 chances sur 100 d'etre looter. Vous devez attendre au minumun une semaine avant de le vendre sur le marcher de la communaute.<br>Prix : <font color='orange'>20 euros</font>";
           }
            document.getElementById('titre_show_loot_user').innerHTML = name;
            document.getElementById('txt_show_loot_user').innerHTML = text;
        }
        
        function hide_loot(e) {
            document.getElementById('show_loot_user').style.display = "none";
        }
    });
}

histo.onclick = function() {
    histo.classList.add("hovers");
    jo.classList.remove("hovers");
    profil.classList.remove("hovers");
    $.post("js_in/search.php", {demande:"histo"}, function(data) {
        conteneur.innerHTML = "";
        conteneur.innerHTML = data;
    });
}

jo.onclick = function() {
    jo.classList.add("hovers");
    profil.classList.remove("hovers");
    histo.classList.remove("hovers");
    $.post("js_in/search.php", {demande:"how_joue"}, function(data) {
        conteneur.innerHTML = "";
        conteneur.innerHTML = data;
    });
}