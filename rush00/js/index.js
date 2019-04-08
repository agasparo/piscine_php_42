$("#left_deroule").click(function() {
	$("#menu-list").animate({
      width: "toggle"
    });
});

var cat = document.querySelectorAll('.cat_menu');
var i = 0;
while (i < cat.length) {
	cat[i].addEventListener("click", function() {do_s(this.innerHTML)});
	i++;
}

function do_s(name) {
	if (name == "Tous")
		location.reload();
	$.post("php/trie.php", {name:name}, function(data) {
		$("#products").html(data);
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
	});
	$("#left_deroule").click();
}