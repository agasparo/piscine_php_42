window.onload = function() {
	var elem = document.querySelectorAll("button");
	var i = 0;
	while (i < elem.length) {
		elem[i].addEventListener("click", function() {do_s(this.id);});
		i++;
	}

	function do_s(id) {
		$("#bg_a").show();
		$.post("php/this_prod.php", {id:id}, function(data) {
			$("#show_a").html(data);
			document.getElementById('close').onclick = function() {
				$("#bg_a").hide();
			}
			if (document.getElementById('buy') != null) {
				document.getElementById('buy').onclick = function() {
					var name = $(this).attr("name");
					$.post("php/add_pann.php", {id:name}, function(data) {
						alert('article ajoute au panier');
						do_s(id);
					});
				}
			}
		});
	}
}