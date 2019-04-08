window.onload = function() {
	var cookie = document.cookie.split(';');
	var i = 0;
	while(cookie[i]) {
		var title = cookie[i].split('=');
		create(title[0]);
		i++;
	}
	document.getElementById('new').onclick = function() {
		var new_todo = prompt("Veuillez renseigner le nouveau todo", "ex : faire ma piscine php");
		new_todo = new_todo.trim();
		if (new_todo !== null && new_todo != "") {
			new_todo = new_todo.replace(/;/g, '');
			new_todo = new_todo.replace(/=/g, '');
			document.cookie = new_todo+'='+new_todo+'; expires=Fri, 01 Jan 2020 00:0:00 UTC; path=/';
			var i = 0;
			var is = 0;
			while (cookie[i]) {
				var e = cookie[i].split('=');
				if (e[0].trim() == new_todo)
					is = 1;
				i++;
			}
			if (is == 0)
				create(new_todo);
		}
	}

	function suppr(name) {
		obj = document.getElementById(name);
	    var fadeEffect = setInterval(function () {
	        if (!obj.style.opacity) {
	            obj.style.opacity = 1;
	        }
	        if (obj.style.opacity > 0) {
	            obj.style.opacity -= 0.1;
	        } else {
	            clearInterval(fadeEffect);
	        }
	    }, 100);
	    setTimeout(function(){ document.getElementById('ft_list').removeChild(obj); }, 1000);
	}

	function create(name) {
		var node = document.createElement("p");
		var textnode = document.createTextNode(name);
		node.appendChild(textnode);
		node.id = name;
		node.addEventListener('click', function() {
			var conf = prompt("Voullez-vous vraiment le supprimer ?", "oui ou non");
			if (conf == 'oui') {
				document.cookie = this.innerHTML+'='+this.innerHTML+'; expires=Fri, 01 Jan 2001 00:0:00 UTC; path=/';
				suppr(this.id);
			}
		});
		var list = document.getElementById("ft_list");
		document.getElementById("ft_list").insertBefore(node, list.childNodes[0]);

	}
}