function dep_pos_left(prem, deb, max_dep, att) {
	var i = 0;
	while (i < prem) {
		id = deb;
		var coord = deb.split("x");
		coord[0] = parseInt(coord[0]);
		var x = coord[0] + 1;
		deb = x+"x"+coord[1];
		var b = 0;
		while (b < max_dep) {
			var coord = id.split("x");
			var y = coord[1] - 1;
			id = coord[0]+"x"+y;
			if (document.getElementById(id) != null) {
				document.getElementById(id).classList.remove("vide");
				if (document.getElementById(id).classList[0] != "vaisseau") {
					if (att == 0)
						document.getElementById(id).classList.add("go");
					else
						document.getElementById(id).classList.add("att");
				} else {
					document.getElementById(id).classList.add("cible");
				}
			} 
			b++;
		}
		i++;
	}
	var coord = deb.split("x");
	var x = coord[0] - 1;
	deb = x+"x"+coord[1];
	return (deb);
}

function dep_pos_bottom(prem, deb, max_dep, att) {
	var i = 0;
	while (i < prem) {
		id = deb;
		var coord = deb.split("x");
		var x = coord[0] - 1;
		deb = x+"x"+coord[1];
		var b = 0;
		while (b < max_dep) {
			var coord = id.split("x");
			var y = parseInt(coord[1]) + 1;
			id = coord[0]+"x"+y;
			if (document.getElementById(id) != null) {
				document.getElementById(id).classList.remove("vide");
				if (document.getElementById(id).classList[0] != "vaisseau") {
					if (att == 0)
						document.getElementById(id).classList.add("go");
					else
						document.getElementById(id).classList.add("att");
				} else {
					document.getElementById(id).classList.add("cible");
				}
			}
			b++;
		}
		i++;
	}
	var coord = deb.split("x");
	var x = parseInt(coord[0]) + 1;
	deb = x+"x"+coord[1];
	return (deb);
}

function dep_pos_right(deu, deb, max_dep, att) {
	var i = 0;
	while (i < deu) {
		if (deb != null) {
			id = deb;
			var b = 0;
			while (b < max_dep) {
				var coord = id.split("x");
				var x = parseInt(coord[0]) + 1;
				id = x+"x"+coord[1];
				if (document.getElementById(id) != null) {
					document.getElementById(id).classList.remove("vide");
					if (document.getElementById(id).classList[0] != "vaisseau") {
						if (att == 0)
							document.getElementById(id).classList.add("go");
						else
							document.getElementById(id).classList.add("att");
					} else {
						document.getElementById(id).classList.add("cible");
					}
				}
				b++;
			}
			var coord = deb.split("x");
			coord[1] = parseInt(coord[1]);
			var y = coord[1] + 1;
			deb = coord[0]+"x"+y;
		}
		i++;
	}
	var coord = deb.split("x");
	var y = coord[1] - 1;
	deb = coord[0]+"x"+y;
	return (deb);
}

function dep_pos_top(deu, deb, max_dep, att) {
	var i = 0;
	while (i < deu) {
		if (deb != null) {
			id = deb;
			var b = 0;
			while (b < max_dep) {
				var coord = id.split("x");
				var x = parseInt(coord[0]) - 1;
				id = x+"x"+coord[1];
				if (document.getElementById(id) != null) {
					document.getElementById(id).classList.remove("vide");
					if (document.getElementById(id).classList[0] != "vaisseau") {
						if (att == 0)
							document.getElementById(id).classList.add("go");
						else
							document.getElementById(id).classList.add("att");
					} else {
						document.getElementById(id).classList.add("cible");
					}
				}
				b++;
			}
			var coord = deb.split("x");
			coord[1] = parseInt(coord[1]);
			var y = coord[1] - 1;
			deb = coord[0]+"x"+y;
		}
		i++;
	}
}

function turn_is(id_t_x, id_x) {
	var min_y = id_t_x[0]+"x"+id_t_x[1];
	while (document.getElementById(min_y).getAttribute('class') == "vaisseau") {
		var coord = min_y.split("x");
		var y = coord[1] - 1;
		min_y = coord[0]+"x"+y;
	}
	var coord = min_y.split("x");
	coord[1] = parseInt(coord[1]);
	var y2 = coord[1] + 1;
	min_y = coord[0]+"x"+y2;
	max_y = min_y;
	while (document.getElementById(max_y).getAttribute('class') == "vaisseau") {
		var coord = max_y.split("x");
		var y1 = parseInt(coord[1]) + 1;
		max_y = coord[0]+"x"+y1;
	}
	return (y+"x"+y1);
}

function dep_top(max, id_top, diff_x, all_j) {
	var j = 0;
	while (j < max[0]) {
		var i = 0;
		while (i < max[1]) {

			var coord = id_top.split("x");
			var x = parseInt(coord[0]) + diff_x;
			new_id = x+"x"+coord[1];

			if (document.getElementById(new_id) == null) {
				var name = document.getElementById(id_top).getAttribute('name');
				var dead = document.querySelectorAll(".vaisseau");
				var a = 0;
				while (a < dead.length) {
					if (dead[a].getAttribute('name') == name) {
						dead[a].classList.remove('vaisseau');
						dead[a].classList.add('vide');
					}
					a++;
				}
				return (0);
			}

			if (document.getElementById(new_id).getAttribute('class') == "asteroid") {
				var name = document.getElementById(id_top).getAttribute('name');
				var dead = document.querySelectorAll(".vaisseau");
				var a = 0;
				while (a < dead.length) {
					if (dead[a].getAttribute('name') == name) {
						dead[a].classList.remove('vaisseau');
						dead[a].classList.add('vide');
					}
					a++;
				}
				return (0);
			}


			document.getElementById(id_top).classList.remove("vaisseau");
			document.getElementById(id_top).classList.add("vide");
			var name = document.getElementById(id_top).getAttribute('name');
			document.getElementById(new_id).classList.remove("vide");
			document.getElementById(new_id).classList.add("vaisseau");
			document.getElementById(new_id).setAttribute('name', name);

			var coord = id_top.split("x");
			coord[1] = parseInt(coord[1]);
			var y = coord[1] + 1;
			id_top = coord[0]+"x"+y;
			i++;
		}
		var coord = id_top.split("x");
		coord[0] = parseInt(coord[0]);
		var x = coord[0] + 1;
		id_top = x+"x"+all_j;
		j++;
	}
	while (document.getElementById(new_id).getAttribute('class') == "vaisseau") {
		var coord = new_id.split("x");
		var x = coord[0] - 1;
		new_id = x+"x"+coord[1];
		if (document.getElementById(new_id) == null)
			break;
	}
	var coord = new_id.split("x");
	coord[0] = parseInt(coord[0]);
	var x = coord[0] + 1;
	new_id = x+"x"+coord[1];
	while (document.getElementById(new_id).getAttribute('class') == "vaisseau") {
		var coord = new_id.split("x");
		var y = coord[1] - 1;
		new_id = coord[0]+"x"+y;
		if (document.getElementById(new_id) == null)
			break;
	}
	var coord = new_id.split("x");
	coord[1] = parseInt(coord[1]);
	var y = coord[1] + 1;
	new_id = coord[0]+"x"+y;
	return (1);
}

function dep_bottom(max, id_top, diff_x, all_j) {
	while (document.getElementById(id_top).getAttribute('class') == "vaisseau") {
		var coord = id_top.split("x");
		var x = parseInt(coord[0]) + 1;
		id_top = x+"x"+coord[1];
		if (document.getElementById(id_top) == null)
			break;
	}
	var coord = id_top.split("x");
	coord[0] = parseInt(coord[0]);
	var x = coord[0] - 1;
	id_top = x+"x"+coord[1];
	var j = 0;
	while (j < max[0]) {
		var i = 0;
		while (i < max[1]) {

			var coord = id_top.split("x");
			var x = parseInt(coord[0]) + diff_x;
			new_id = x+"x"+coord[1];

			if (document.getElementById(new_id) == null) {
				var name = document.getElementById(id_top).getAttribute('name');
				var dead = document.querySelectorAll(".vaisseau");
				var a = 0;
				while (a < dead.length) {
					if (dead[a].getAttribute('name') == name) {
						dead[a].classList.remove('vaisseau');
						dead[a].classList.add('vide');
					}
					a++;
				}
				return (0);
			}

			if (document.getElementById(new_id).getAttribute('class') == "asteroid") {
				var name = document.getElementById(id_top).getAttribute('name');
				var dead = document.querySelectorAll(".vaisseau");
				var a = 0;
				while (a < dead.length) {
					if (dead[a].getAttribute('name') == name) {
						dead[a].classList.remove('vaisseau');
						dead[a].classList.add('vide');
					}
					a++;
				}
				return (0);
			}

			if (document.getElementById(new_id).getAttribute('class') == "vaisseau") {
				var name = document.getElementById(id_top).getAttribute('name');
				var dead = document.querySelectorAll(".vaisseau");
				var a = 0;
				while (a < dead.length) {
					if (dead[a].getAttribute('name') == name) {
						dead[a].classList.remove('vaisseau');
						dead[a].classList.add('vide');
					}
					a++;
				}
				var name = document.getElementById(new_id).getAttribute('name');
				var dead = document.querySelectorAll(".vaisseau");
				var a = 0;
				while (a < dead.length) {
					if (dead[a].getAttribute('name') == name) {
						dead[a].classList.remove('vaisseau');
						dead[a].classList.add('vide');
					}
					a++;
				}
				return (0);
			}

			document.getElementById(id_top).classList.remove("vaisseau");
			document.getElementById(id_top).classList.add("vide");
			var name = document.getElementById(id_top).getAttribute('name');
			document.getElementById(new_id).classList.remove("vide");
			document.getElementById(new_id).classList.add("vaisseau");
			document.getElementById(new_id).setAttribute('name', name);

			var coord = id_top.split("x");
			coord[1] = parseInt(coord[1]);
			var y = coord[1] + 1;
			id_top = coord[0]+"x"+y;
			i++;
		}
		var coord = id_top.split("x");
		coord[0] = parseInt(coord[0]);
		var x = coord[0] - 1;
		id_top = x+"x"+all_j;
		j++;
	}
	return (1);
}

function dep_left(max, need, diff_y, all_j, ars, diff_x) {

	while (document.getElementById(need).getAttribute('class') == "vaisseau") {
		var coord = need.split("x");
		var y = coord[1] - 1;
		need = coord[0]+"x"+y;
		if (document.getElementById(need) == null)
			break;
	}
	var coord = need.split("x");
	coord[1] = parseInt(coord[1]);
	var y = coord[1] + 1;
	need = coord[0]+"x"+y;

	while (document.getElementById(need).getAttribute('class') == "vaisseau") {
		var coord = need.split("x");
		var x = coord[0] - 1;
		need = x+"x"+coord[1];
		if (document.getElementById(need) == null)
			break;
	}
	var coord = need.split("x");
	coord[0] = parseInt(coord[0]);
	var x = coord[0] + 1;
	need = x+"x"+coord[1];

	var coord = need.split("x");
	var y = parseInt(coord[1]) + diff_y;
	next = coord[0]+"x"+y;
	var ars = coord[0];
	if (diff_y != 0) {
		var j = 0;
		while (j < max[1]) {
			var i = 0;
			while (i < max[0]) {
				var coord = need.split("x");
				var y = parseInt(coord[1]) + diff_y;
				new_id = coord[0]+"x"+y;

				if (document.getElementById(new_id) == null) {
					var name = document.getElementById(need).getAttribute('name');
					var dead = document.querySelectorAll(".vaisseau");
					var a = 0;
					while (a < dead.length) {
						if (dead[a].getAttribute('name') == name) {
							dead[a].classList.remove('vaisseau');
							dead[a].classList.add('vide');
						}
						a++;
					}
					return (0);
				}

				if (document.getElementById(new_id).getAttribute('class') == "asteroid") {
					var name = document.getElementById(need).getAttribute('name');
					var dead = document.querySelectorAll(".vaisseau");
					var a = 0;
					while (a < dead.length) {
						if (dead[a].getAttribute('name') == name) {
							dead[a].classList.remove('vaisseau');
							dead[a].classList.add('vide');
						}
						a++;
					}
					return (0);
				}

				document.getElementById(need).classList.remove("vaisseau");
				document.getElementById(need).classList.add("vide");
				var name = document.getElementById(need).getAttribute('name');
				document.getElementById(new_id).classList.remove("vide");
				document.getElementById(new_id).classList.add("vaisseau");
				document.getElementById(new_id).setAttribute('name', name);

				var coord = need.split("x");
				coord[0] = parseInt(coord[0]);
				var x = coord[0] + 1;
				need = x+"x"+coord[1];
				i++;
			}
			var coord = need.split("x");
			coord[1] = parseInt(coord[1]);
			var y = coord[1] + 1;
			need = ars+"x"+y;
			j++;
		}
	}
	var j = 0;
	var final = next;
	var mort = 0;
	while (j < max[0]) {
		var i = 0;
		var coord = next.split("x");
		var x_h = parseInt(coord[0]);
		var x1 = ars;
		while (i < max[1]) {
			var coord = next.split("x");
			var y = parseInt(coord[1]) - i - j;
			var x = x_h - j - i;
			var new_id = x+"x"+y;	

			if (document.getElementById(new_id) == null) {
				var name = document.getElementById(next).getAttribute('name');
				var dead = document.querySelectorAll(".vaisseau");
				var a = 0;
				while (a < dead.length) {
					if (dead[a].getAttribute('name') == name) {
						dead[a].classList.remove('vaisseau');
						dead[a].classList.add('vide');
					}
					a++;
				}
				return (0);
			}

			if (document.getElementById(new_id).getAttribute('class') == "asteroid") {
				var name = document.getElementById(next).getAttribute('name');
				var dead = document.querySelectorAll(".vaisseau");
				var a = 0;
				while (a < dead.length) {
					if (dead[a].getAttribute('name') == name) {
						dead[a].classList.remove('vaisseau');
						dead[a].classList.add('vide');
					}
					a++;
				}
				return (0);
			}

			document.getElementById(next).classList.remove("vaisseau");
			document.getElementById(next).classList.add("vide");
			var name = document.getElementById(next).getAttribute('name');
			if (document.getElementById(new_id) != null && mort == 0) {
				document.getElementById(new_id).classList.remove("vide");
			    document.getElementById(new_id).classList.add("vaisseau");
			    document.getElementById(new_id).setAttribute('name', name);
			} else {
				mort++;
				if (mort == 1) {
					i = 0;
					j = 0;
					next = final;
					document.getElementById(next).classList.remove("vaisseau");	
				} else {
					document.getElementById(next).classList.remove("vaisseau");
				}
			}
			var coord = next.split("x");
			coord[1] = parseInt(coord[1]);
			var y = coord[1] + 1;
			next = coord[0]+"x"+y;
			i++;
		}
		var y1 = y - max[1];
		var x1 = x1 - (j - 1);
		if (j > 0)
			x1 = x1 + j + j;
		next = x1+"x"+y1;
		j++;
	}
	while (document.getElementById(final).getAttribute('class') == "vaisseau") {
		var coord = final.split("x");
		var y = coord[1] - 1;
		final = coord[0]+"x"+y;
	}
	var coord = final.split("x");
	coord[1] = parseInt(coord[1]);
	var y = coord[1] + 1;
	final = coord[0]+"x"+y;
	e = max[1];
	max[1] = max[0];
	max[0] = e;
	if (mort == 0)
		dep_bottom(max, final, diff_x, y);
	return (1);
}

function dep_in_right(max, need, diff_y, all_j, ars, diff_x, suite) {
	while (document.getElementById(need).getAttribute('class') == "vaisseau") {
		var coord = need.split("x");
		var y = coord[1] - 1;
		need = coord[0]+"x"+y;
		if (document.getElementById(need) == null)
			break;
	}
	var coord = need.split("x");
	coord[1] = parseInt(coord[1]);
	var y = coord[1] + 1;
	need = coord[0]+"x"+y;

	while (document.getElementById(need).getAttribute('class') == "vaisseau") {
		var coord = need.split("x");
		var x = coord[0] - 1;
		need = x+"x"+coord[1];
		if (document.getElementById(need) == null)
			break;
	}
	var coord = need.split("x");
	coord[0] = parseInt(coord[0]);
	var x = coord[0] + 1;
	need = x+"x"+coord[1];

	var coord = need.split("x");
	var x = parseInt(coord[0]) + diff_x - parseInt(max[1]);
	next = x+"x"+coord[1];
	var ars = coord[0];
	if (diff_y != 0) {
		var j = 0;
		while (j < max[1]) {
			var i = 0;
			while (i < max[0]) {
				var coord = need.split("x");
				var x = parseInt(coord[0]) + diff_x - parseInt(max[1]);
				new_id = x+"x"+coord[1];

				if (document.getElementById(new_id) == null) {
					var name = document.getElementById(need).getAttribute('name');
					var dead = document.querySelectorAll(".vaisseau");
					var a = 0;
					while (a < dead.length) {
						if (dead[a].getAttribute('name') == name) {
							dead[a].classList.remove('vaisseau');
							dead[a].classList.add('vide');
						}
						a++;
					}
					return (0);
				}

				if (document.getElementById(new_id).getAttribute('class') == "asteroid") {
					var name = document.getElementById(need).getAttribute('name');
					var dead = document.querySelectorAll(".vaisseau");
					var a = 0;
					while (a < dead.length) {
						if (dead[a].getAttribute('name') == name) {
							dead[a].classList.remove('vaisseau');
							dead[a].classList.add('vide');
						}
						a++;
					}
					return (0);
				}

				document.getElementById(need).classList.remove("vaisseau");
				document.getElementById(need).classList.add("vide");
				var name = document.getElementById(need).getAttribute('name');
				document.getElementById(new_id).classList.remove("vide");
				document.getElementById(new_id).classList.add("vaisseau");
				document.getElementById(new_id).setAttribute('name', name);

				var coord = need.split("x");
				coord[0] = parseInt(coord[0]);
				var x = coord[0] + 1;
				need = x+"x"+coord[1];
				i++;
			}
			var coord = need.split("x");
			coord[1] = parseInt(coord[1]);
			var y = coord[1] + 1;
			need = ars+"x"+y;
			j++;
		}
	}
	suppr_sur(need);
	return (1);
}

function dep_in_left(max, need, diff_y, all_j, ars, diff_x, suite) {
	while (document.getElementById(need).getAttribute('class') == "vaisseau") {
		var coord = need.split("x");
		var y = coord[1] - 1;
		need = coord[0]+"x"+y;
		if (document.getElementById(need) == null)
			break;
	}
	var coord = need.split("x");
	coord[1] = parseInt(coord[1]);
	var y = coord[1] + 1;
	need = coord[0]+"x"+y;

	while (document.getElementById(need).getAttribute('class') == "vaisseau") {
		var coord = need.split("x");
		var x = parseInt(coord[0]) + 1;
		need = x+"x"+coord[1];
		if (document.getElementById(need) == null)
			break;
	}
	var coord = need.split("x");
	coord[0] = parseInt(coord[0]);
	var x = coord[0] - 1;
	need = x+"x"+coord[1];

	var coord = need.split("x");
	var x = parseInt(coord[0]) + diff_x + parseInt(max[1]);
	next = x+"x"+coord[1];
	var ars = coord[0];
	if (diff_y != 0) {
		var j = 0;
		while (j < max[1]) {
			var i = 0;
			while (i < max[0]) {
				var coord = need.split("x");
				var x = parseInt(coord[0]) + diff_x + parseInt(max[1]);
				new_id = x+"x"+coord[1];

				if (document.getElementById(new_id) == null) {
					var name = document.getElementById(need).getAttribute('name');
					var dead = document.querySelectorAll(".vaisseau");
					var a = 0;
					while (a < dead.length) {
						if (dead[a].getAttribute('name') == name) {
							dead[a].classList.remove('vaisseau');
							dead[a].classList.add('vide');
						}
						a++;
					}
					return (0);
				}

				if (document.getElementById(new_id).getAttribute('class') == "asteroid") {
					var name = document.getElementById(need).getAttribute('name');
					var dead = document.querySelectorAll(".vaisseau");
					var a = 0;
					while (a < dead.length) {
						if (dead[a].getAttribute('name') == name) {
							dead[a].classList.remove('vaisseau');
							dead[a].classList.add('vide');
						}
						a++;
					}
					return (0);
				}

				document.getElementById(need).classList.remove("vaisseau");
				document.getElementById(need).classList.add("vide");
				var name = document.getElementById(need).getAttribute('name');
				document.getElementById(new_id).classList.remove("vide");
				document.getElementById(new_id).classList.add("vaisseau");
				document.getElementById(new_id).setAttribute('name', name);

				var coord = need.split("x");
				coord[0] = parseInt(coord[0]);
				var x = coord[0] - 1;
				need = x+"x"+coord[1];
				i++;
			}
			var coord = need.split("x");
			coord[1] = parseInt(coord[1]);
			var y = coord[1] + 1;
			need = ars+"x"+y;
			j++;
		}
	}
	suppr_sur_in(need);
	decale_y(diff_y, new_id, max);
	return (1);
}

function decale_y(diff_y, need, max) {

	while (document.getElementById(need).getAttribute('class') == "vaisseau") {
		var coord = need.split("x");
		var y = coord[1] - 1;
		need = coord[0]+"x"+y;
		if (document.getElementById(need) == null)
			break;
	}
	var coord = need.split("x");
	coord[1] = parseInt(coord[1]);
	var y = coord[1] + 1;
	need = coord[0]+"x"+y;
	var ars = coord[0];

	while (document.getElementById(need).getAttribute('class') == "vaisseau") {
		var coord = need.split("x");
		var x = coord[0] - 1;
		need = x+"x"+coord[1];
		if (document.getElementById(need) == null)
			break;
	}
	var coord = need.split("x");
	coord[0] = parseInt(coord[0]);
	var x = coord[0] + 1;
	need = x+"x"+coord[1];
	if (diff_y != 0) {
		var j = 0;
		while (j < max[1]) {
			var i = 0;
			while (i < max[0]) {
				var coord = need.split("x");
				var y = parseInt(coord[1]) + diff_y;
				new_id = coord[0]+"x"+y;

				if (document.getElementById(new_id) == null) {
					var name = document.getElementById(need).getAttribute('name');
					var dead = document.querySelectorAll(".vaisseau");
					var a = 0;
					while (a < dead.length) {
						if (dead[a].getAttribute('name') == name) {
							dead[a].classList.remove('vaisseau');
							dead[a].classList.add('vide');
						}
						a++;
					}
					return (0);
				}

				if (document.getElementById(new_id).getAttribute('class') == "asteroid") {
					var name = document.getElementById(need).getAttribute('name');
					var dead = document.querySelectorAll(".vaisseau");
					var a = 0;
					while (a < dead.length) {
						if (dead[a].getAttribute('name') == name) {
							dead[a].classList.remove('vaisseau');
							dead[a].classList.add('vide');
						}
						a++;
					}
					return (0);
				}

				document.getElementById(need).classList.remove("vaisseau");
				document.getElementById(need).classList.add("vide");
				var name = document.getElementById(need).getAttribute('name');
				document.getElementById(new_id).classList.remove("vide");
				document.getElementById(new_id).classList.add("vaisseau");
				document.getElementById(new_id).setAttribute('name', name);

				var coord = need.split("x");
				coord[0] = parseInt(coord[0]);
				var x = coord[0] + 1;
				need = x+"x"+coord[1];
				i++;
			}
			var coord = need.split("x");
			coord[1] = parseInt(coord[1]);
			var y = coord[1] + 1;
			need = ars+"x"+y;
			j++;
		}
	}
	return (1);
}


function suppr_sur(id) {
	var coord = id.split("x");
	var x_b = coord[0];
	while (document.getElementById(id).getAttribute('class') == "vaisseau") {
		while (document.getElementById(id).getAttribute('class') == "vaisseau") {
			document.getElementById(id).classList.remove("vaisseau");
			document.getElementById(id).classList.add("vide");
			var coord = id.split("x");
			coord[0] = parseInt(coord[0]);
			var x = coord[0] + 1;
			id = x+"x"+coord[1];
			if (document.getElementById(id) == null)
				break;
		}
		var coord = id.split("x");
		coord[1] = parseInt(coord[1]);
		var y = coord[1] + 1;
		id = x_b+"x"+y;
		if (document.getElementById(id) == null)
				break;
	}
}

function suppr_sur_in(id) {
	var coord = id.split("x");
	var x_b = coord[0];
	while (document.getElementById(id).getAttribute('class') == "vaisseau") {
		while (document.getElementById(id).getAttribute('class') == "vaisseau") {
			document.getElementById(id).classList.remove("vaisseau");
			document.getElementById(id).classList.add("vide");
			var coord = id.split("x");
			coord[0] = parseInt(coord[0]);
			var x = coord[0] - 1;
			id = x+"x"+coord[1];
			if (document.getElementById(id) == null)
				break;
		}
		var coord = id.split("x");
		coord[1] = parseInt(coord[1]);
		var y = coord[1] + 1;
		id = x_b+"x"+y;
		if (document.getElementById(id) == null)
				break;
	}
}