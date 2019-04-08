function mis_top(sol, ct) {
	var coord = id.split("x");
	coord[1] = parseInt(coord[1]);
	var y = coord[1] + 1;
	id = coord[0]+"x"+y;
	var ay = id.split("x");
	var a2 = id_att.split("x");
	var e = 0;
	while (e < ct) {
		var y = parseInt(ay[1]) + e;
		var new_id = ay[0]+"x"+y;
		if (parseInt(ay[0]) > parseInt(a2[0])) {
			while (document.getElementById(new_id).getAttribute('class') == "vaisseau cible") {
				var coord = new_id.split("x");
				var x = coord[0] - 1;
				new_id = x+"x"+coord[1];
				if (document.getElementById(new_id) == null)
					break;
			}
			while (document.getElementById(new_id).getAttribute('class') == "att") {
				var coord = new_id.split("x");
				var x = coord[0] - 1;
				new_id = x+"x"+coord[1];
			}
			if (document.getElementById(new_id).getAttribute('class') == "vaisseau") {
				return (new_id);
			}
		}
		e++;
	}
}

function mis_bot(sol, ct) {
	var coord = id.split("x");
	coord[1] = parseInt(coord[1]);
	var y = coord[1] + 1;
	id = coord[0]+"x"+y;
	var ay = id.split("x");
	var a2 = id_att.split("x");
	var e = 0;
	while (e < ct) {
		var y = parseInt(ay[1]) + e;
		var new_id = ay[0]+"x"+y;
		if (parseInt(ay[0]) < parseInt(a2[0])) {
			while (document.getElementById(new_id).getAttribute('class') == "vaisseau cible") {
				var coord = new_id.split("x");
				var x = parseInt(coord[0]) + 1;
				new_id = x+"x"+coord[1];
			}
			while (document.getElementById(new_id).getAttribute('class') == "att") {
				var coord = new_id.split("x");
				var x = parseInt(coord[0]) + 1;
				new_id = x+"x"+coord[1];
			}
			if (document.getElementById(new_id).getAttribute('class') == "vaisseau") {
				return (new_id);
			}
		}
		e++;
	}
}

function mis_left(sol, ct) {
	var coord = id.split("x");
	coord[1] = parseInt(coord[1]);
	var y = coord[1] + 1;
	id = coord[0]+"x"+y;
	var ay = id.split("x");
	var a2 = id_att.split("x");
	var e = 0;
	while (e < ct) {
		var x = parseInt(ay[0]) + e;
		var new_id = x+"x"+ay[1];
		if (parseInt(ay[1]) < parseInt(a2[1])) {
			while (document.getElementById(new_id).getAttribute('class') == "vaisseau cible") {
				var coord = new_id.split("x");
				var y = parseInt(coord[1]) + 1;
				new_id = coord[0]+"x"+y;
			}
			while (document.getElementById(new_id).getAttribute('class') == "att") {
				var coord = new_id.split("x");
				var y = parseInt(coord[1]) + 1;
				new_id = coord[0]+"x"+y;
			}
			if (document.getElementById(new_id).getAttribute('class') == "vaisseau") {
				return (new_id);
			}
		}
		e++;
	}
}

function mis_right(sol, ct) {
	var coord = id.split("x");
	coord[1] = parseInt(coord[1]);
	var y = coord[1] + 1;
	id = coord[0]+"x"+y;
	var ay = id.split("x");
	var a2 = id_att.split("x");
	var e = 0;
	while (e < ct) {
		var x = parseInt(ay[0]) + e;
		var new_id = x+"x"+ay[1];
		if (parseInt(ay[1]) > parseInt(a2[1])) {
			while (document.getElementById(new_id).getAttribute('class') == "vaisseau cible") {
				var coord = new_id.split("x");
				var y = parseInt(coord[1]) - 1;
				new_id = coord[0]+"x"+y;
			}
			while (document.getElementById(new_id).getAttribute('class') == "att") {
				var coord = new_id.split("x");
				var y = parseInt(coord[1]) - 1;
				new_id = coord[0]+"x"+y;
			}
			if (document.getElementById(new_id).getAttribute('class') == "vaisseau") {
				return (new_id);
			}
		}
		e++;
	}
}


function check_top(sol) {
	var e = sol[0];
	var coord = sol[0].split("x");
	var x = coord[0] - 1;
	sol[0] = x+"x"+coord[1];
	while (document.getElementById(sol[0]).getAttribute('class')  == "vaisseau") {
		var coord = sol[0].split("x");
		var x = parseInt(coord[0]) + 1;
		sol[0] = x+"x"+coord[1];
		if (document.getElementById(sol[0]) == null)
			break;
	}
	while (document.getElementById(id).getAttribute('class')  == "vaisseau") {
		var coord = id.split("x");
		var x = parseInt(coord[0]) - 1;
		id = x+"x"+coord[1];
	}
	return (id);
}

function check_bot(sol) {
	var e = sol[0];
	var coord = sol[0].split("x");
	var x = coord[0] - 1;
	sol[0] = x+"x"+coord[1];
	while (document.getElementById(sol[0]).getAttribute('class')  == "vaisseau") {
		var coord = sol[0].split("x");
		var x = parseInt(coord[0]) - 1;
		sol[0] = x+"x"+coord[1];
		if (document.getElementById(sol[0]) == null)
			break;
	}
	while (document.getElementById(id).getAttribute('class')  == "vaisseau") {
		var coord = id.split("x");
		var x = parseInt(coord[0]) + 1;
		id = x+"x"+coord[1];
	}
	return (id);
}

function check_left(sol) {
	var e = sol[0];
	var coord = sol[0].split("x");
	var y = coord[1] - 1;
	sol[0] = coord[0]+"x"+y;
	while (document.getElementById(sol[0]).getAttribute('class')  == "vaisseau") {
		var coord = sol[0].split("x");
		var y = parseInt(coord[1]) - 1;
		sol[0] = coord[0]+"x"+y;
		if (document.getElementById(sol[0]) == null)
			break;
	}
	while (document.getElementById(id).getAttribute('class')  == "vaisseau") {
		var coord = id.split("x");
		var y = parseInt(coord[1]) + 1;
		id = coord[0]+"x"+y;
	}
	return (id);
}

function check_right(sol) {
	var e = sol[0];
	var coord = sol[0].split("x");
	var y = coord[1] - 1;
	sol[0] = coord[0]+"x"+y;
	while (document.getElementById(sol[0]).getAttribute('class')  == "vaisseau") {
		var coord = sol[0].split("x");
		var y = parseInt(coord[1]) + 1;
		sol[0] = coord[0]+"x"+y;
		if (document.getElementById(sol[0]) == null)
			break;
	}
	while (document.getElementById(id).getAttribute('class')  == "vaisseau") {
		var coord = id.split("x");
		var y = parseInt(coord[1]) - 1;
		id = coord[0]+"x"+y;
	}
	return (id);
}

function target_missile_top(sol, id_des) {

	var coord = sol[0].split("x");
	var x = parseInt(coord[0]) + 1;
	sol[0] = x+"x"+coord[1];
	var coord = id_des.split("x");
	var x = parseInt(coord[0]) + 1;
	id_des = x+"x"+coord[1];
	document.getElementById(sol[0]).classList.remove("vide");
	document.getElementById(sol[0]).classList.add("missile");
	document.getElementById(id_des).classList.remove("missile");
	document.getElementById(id_des).classList.add("vide");
	return (id_des);
}

function target_missile_bot(sol, id_des) {

	var coord = sol[0].split("x");
	var x = parseInt(coord[0]) - 1;
	sol[0] = x+"x"+coord[1];
	var coord = id_des.split("x");
	var x = parseInt(coord[0]) - 1;
	id_des = x+"x"+coord[1];
	document.getElementById(sol[0]).classList.remove("vide");
	document.getElementById(sol[0]).classList.add("missile");
	document.getElementById(id_des).classList.remove("missile");
	document.getElementById(id_des).classList.add("vide");
	return (id_des);
}

function target_missile_left(sol, id_des) {

	var coord = sol[0].split("x");
	var y = parseInt(coord[1]) - 1;
	sol[0] = coord[0]+"x"+y;
	var coord = id_des.split("x");
	var y = parseInt(coord[1]) - 1;
	id_des = coord[0]+"x"+y;
	document.getElementById(sol[0]).classList.remove("vide");
	document.getElementById(sol[0]).classList.add("missile");
	document.getElementById(id_des).classList.remove("missile");
	document.getElementById(id_des).classList.add("vide");
	return (id_des);
}

function target_missile_right(sol, id_des) {

	var coord = sol[0].split("x");
	var y = parseInt(coord[1]) + 1;
	sol[0] = coord[0]+"x"+y;
	var coord = id_des.split("x");
	var y = parseInt(coord[1]) + 1;
	id_des = coord[0]+"x"+y;
	document.getElementById(sol[0]).classList.remove("vide");
	document.getElementById(sol[0]).classList.add("missile");
	document.getElementById(id_des).classList.remove("missile");
	document.getElementById(id_des).classList.add("vide");
	return (id_des);
}

function destroy(id_ex, damma, mort, attaquant) {
	var elem = document.getElementById(id_ex);
	$(elem).html("<img src='img/explode.gif' style='position:fixed; width: 100px; height: 100px;'>");
	elem.classList.remove("missile");
	elem.classList.add("vide");
	var ee = document.querySelectorAll('td');
	var i = 0;
	while (i < ee.length) {
		if (ee[i].getAttribute('class') == "missile") {
			ee[i].classList.remove("missile");
			ee[i].classList.add("vide");
		}
		i++;
	}
	$("#dammage").html("<h1 class='dam'>"+name+" "+damma+"</h1>");
	document.getElementById('dammage').style.display = 'block';
	setTimeout(function(){
		$(elem).html("");
		$("#dammage").hide();
	}, 3000);
	if (mort == 1) {
		var entite = document.querySelectorAll('.vaisseau');
		var a = 0;
		while (a < entite.length) {
			if (entite[a].getAttribute('name') == name) {
				$(entite[a]).html("<img src='img/explode.gif' style='position:fixed; width: 100px; height: 100px;'>");
				entite[a].classList.remove('vaisseau');
				entite[a].classList.add("vide");
			}
			a++;
		}
		$("#dammage").html("<h1 class='dam'>"+name+" est mort</h1>");
		document.getElementById('dammage').style.display = 'block';
		j_name = name.substr(name.length - 1);
		j_attaquant = attaquant.substr(attaquant.length - 1);
		if (j_name == j_attaquant)
			var co = 1;
		setTimeout(function(){
			if (co == 1)
				cine_mort_co(name, attaquant);
			$("#dammage").hide();
			var supp_ex = document.querySelectorAll('td');
			var a = 0;
			while (a < entite.length) {
				if (entite[a].getAttribute('name') == name) {
					$(entite[a]).html("");
				}
				a++;
			}
		}, 3000);
	}
}