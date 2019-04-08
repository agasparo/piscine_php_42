window.onload = function() {
	$.post("select.php", function(data) {
  		if (data) {
  			var title = data.split("\n");
  			var i = 0;
  			while(i < title.length) {
  				if (title[i] != "")
  					create(title[i]);
  				i++;
  			}
  		}
	});

	$("#new").click(function(){
		var new_todo = prompt("Veuillez renseigner le nouveau todo", "ex : faire ma piscine php");
		if (new_todo != null) {
			$.post("select.php", function(data) {
		  		if (data) {
  					var e = data.split("\n");
  					var id = e.length-1;
  				} else {
  					var id = 0;
  				}
				$.post("insert.php", {id:id, name:new_todo}, function(data) {
					create(data);
				});
			});
		}
	});

	function suppr(name) {
		obj = document.getElementById(name);
		document.getElementById('ft_list').removeChild(obj);
	}

	function create(name) {
		var data = name.split(";");
		var node = document.createElement("p");
		var textnode = document.createTextNode(data[1]);
		node.appendChild(textnode);
		node.id = data[0];
		node.addEventListener('click', function() {
			var conf = prompt("Voulez-vous vraiment le supprimer ?", "oui ou non");
			if (conf == 'oui') {
				$.post("delete.php", {id:this.id}, function(data) {
					console.log(data);
				});
				suppr(this.id);
			}
		});
		var list = document.getElementById("ft_list");
		document.getElementById("ft_list").insertBefore(node, list.childNodes[0]);
	}
}