$(document).ready(function() {
	var cookie = document.cookie.split(';');
	var i = 0;
	while(cookie[i]) {
		var title = cookie[i].split('=');
		create(title[0]);
		i++;
	}
	$('#new').click(function() {
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
	});

	function create(name) {
		$("#ft_list").prepend("<p id='"+name+"'>"+name+"</p>");
		var elem = $("#ft_list").find("p");
		$(elem[0]).bind('click', function() {
			var conf = prompt("Voulez-vous vraiment le supprimer ?", "oui ou non");
			if (conf == 'oui') {
				document.cookie = this.innerHTML+'='+this.innerHTML+'; expires=Fri, 01 Jan 2001 00:0:00 UTC; path=/';
				this.remove();
			}
		});

	}
});