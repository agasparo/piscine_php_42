function lancer() {
	var rand = Math.floor(Math.random() * 10) - 3;
	if (rand <= 0)
		rand = parseInt(rand) + 3;
	return (rand);
}

function is_finish() {
	var vai = document.querySelectorAll('.vaisseau');
	var i = 0;
	var j1_f = 0;
	var j2_f = 0;
	while (i < vai.length) {
		var wc = vai[i].getAttribute('name');
		if (wc.substr(wc.length - 1) == 1)
			j1_f = 1;
		if (wc.substr(wc.length - 1) == 2)
			j2_f = 1;
		i++;
	}
	if (j2_f == 0)
		return (2);
	if (j1_f == 0)
		return (1);
}

function count(id) {
	var ct = 0;
	var i = 0;
	var is = new Array();
	var vai = document.querySelectorAll('.vaisseau');
	while (i < vai.length) {
		var wc = vai[i].getAttribute('name');
		if (wc.substr(wc.length - 1) == id && is.indexOf(vai[i].getAttribute('name')) == -1) {
			is[is.length] = vai[i].getAttribute('name');
			ct++;
		}
		i++;
	}
	return (ct);
}

function reset_obj(id) {
	var get_all = document.querySelectorAll('.vaisseau');
	var i = 0;
	var is = new Array();
	while (i < get_all.length) {
		var wc = get_all[i].getAttribute('name');
		if (wc.substr(wc.length - 1) == id && is.indexOf(get_all[i].getAttribute('name')) == -1) {
			is[is.length] = wc;
			$.post("reset_bonus.php", {name:name}, function(data) {
			}); 
		}
		i++;
	}
}

function reset_name() {
	var get_all = document.querySelectorAll('.vide');
	var i = 0;
	while (i < get_all.length) {
		if (get_all[i].getAttribute('name'))
			get_all[i].removeAttribute("name");
		i++;
	}
}

function reset_vide() {
	var get_all = document.querySelectorAll('td');
	var i = 0;
	while (i < get_all.length) {
		if (get_all[i].getAttribute('class') == "") {
			get_all[i].removeAttribute("class");
			get_all[i].setAttribute("class", 'vide');
		}
		i++;
	}
}