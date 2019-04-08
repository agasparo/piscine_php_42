window.onload = function() {

	document.getElementById('reco').onclick = function() {
		location.reload();
	}

	add_event('.img_l', select);
	var action;

	function add_event(obj, func) {
		var i = 0;
		var elem = document.querySelectorAll(obj);
		while (i < elem.length) {
			elem[i].addEventListener('click', func);
			i++;
		}
	}

	function remove_event(obj, func) {
		var i = 0;
		var elem = document.querySelectorAll(obj);
		while (i < elem.length) {
			elem[i].removeEventListener('click', func);
			i++;
		}
	}

	function elem(type, obj) {
		var i = 0;
		var elem = document.querySelectorAll(obj);
		while (i < elem.length) {
			elem[i].style.display = type;
			i++;
		}
	}

	function select(e) {
		action = e.target.title;
		var src = document.getElementById('menu_m_i').src.split('/');
		remove_event('.img_l', select);
		if (action == "Avancer") {
			if (src[src.length - 1] == 'cluster.jpg') {
				document.getElementById('menu_m_i').src = 'resources/out.jpg';
			} else {
				document.getElementById('menu_m_i').src = 'resources/cluster.jpg';
			}
			add_event('.img_l', select);
		}

		if (action == "Prendre") {
			alert("il n'y a rien a prendre ici ...");
			add_event('.img_l', select);
		}

		if (src[src.length - 1] == 'cluster.jpg') {
			if (action == 'Regarder') {
				elem('block', '.named');
				setTimeout(function(){
					elem('none', '.named');
					add_event('.img_l', select);
				}, 3000);
			} else {
				add_event('.mouv', mouv_select);
			}
		} else {
			remove_event('.mouv', mouv_select);
			add_event('.img_l', select);
		}
	}

	function mouv_select(e) {
		var src = document.getElementById('menu_m_i').src.split('/');
		if (src[src.length - 1] == 'cluster.jpg')
			remove_event('.mouv', mouv_select);
		result(action, e.target.id);
	}

	function result(action, mouv) {
		var matches = mouv.match(action);
		if (matches) {
			if (mouv == 'Parler0') {
				var tab = new Array();
				tab[0] = 'Salut tu cherche un ordinateur ?';
				tab[1] = 'ah ok ...';
				tab[2] = 'Demande a Fred';
				speech(tab);
			} else if (mouv == 'Parler1') {
				var tab = new Array();
				tab[0] = "Salut je suis Fred, c'est toi qui cherche un ordinateur ?";
				tab[1] = 'ah ok ...';
				tab[2] = 'prend celui de la premiere rangee (indice : le second a droite)';
				speech(tab);
			} else if (mouv == 'Utiliser0') {
				change_scene('resources/img1.jpg');
			}
		} else {
			alert('action impossible ...');
		}
		var src = document.getElementById('menu_m_i').src.split('/');
		if (src[src.length - 1] == 'img1.jpg') {
			var rep = prompt('Veux-tu aller sur ton intra ?');
			if (rep == 'oui') {
				var image = document.createElement("img");
				image.src = 'resources/intra.png';
				image.style.position = 'fixed';
				image.style.top = '20%';
				image.style.left = '30%';
				image.style.width = '30%';
				image.style.height = '40%';
				document.body.appendChild(image);
				var fermer = document.createElement("div");
				fermer.style.position = 'fixed';
				fermer.style.top = '20%';
				fermer.style.left = '30%';
				fermer.style.width = '0.7%';
				fermer.style.height = '1%';
				fermer.style.cursor = 'pointer';
				document.body.appendChild(fermer);
				fermer.onclick = function() {
					var rep = prompt('Veux-tu arreter ta session ?');
					if (rep == 'oui') {
						document.body.removeChild(fermer);
						document.body.removeChild(image);
						document.getElementById('menu_m_i').src = 'resources/cluster.jpg';
						add_event('.img_l', select);
					}
				}

			} else {
				document.getElementById('menu_m_i').src = 'resources/cluster.jpg';
				add_event('.img_l', select);
			}
		} else {
			add_event('.img_l', select);
		}
	}

	function speech(tab_speech) {
		alert(tab_speech[0]);
		var rep = prompt('oui / non');
		if (rep != 'oui') {
			alert(tab_speech[1]);
		} else {
			alert(tab_speech[2]);
		}
	}

	function change_scene(img) {
		document.getElementById('menu_m_i').src = img;
	}

};