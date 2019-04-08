$("#pan").click(function() {
	$("#show_a").html("");
	$("#bg_a").show();
	$("#show_a").load("php/in_pann.php", function() {
		$("#close_p").click(function() {
			$("#bg_a").hide();
			$("#show_a").html("");
		});
		var elem = document.querySelectorAll(".suppr");
		var i = 0;
		while (i < elem.length) {
			elem[i].addEventListener("click", function() {do_s(this.id);});
			i++;
		}

		function do_s(id) {
			var name = document.getElementById(id).getAttribute('name');
			$.post("php/suppr_art.php", {id:id, id_user:name}, function(data) {
				$("#pan").click();
			});
		}
		if ($("#valider") != null) {
			$("#valider").click(function() {
				var ar = document.getElementById('max_size').innerHTML;
				var def = "<td>0 €</td>";
				var match = ar.match(def);
				if (match == undefined) {
					$.post("php/add_valid_comm.php", function(data) {
					});
					alert("commande validee");
					$("#pan").click();
				}
			});
		}
	});
});