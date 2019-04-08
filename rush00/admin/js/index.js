window.onload = function() {
	document.getElementById('tab1').onclick = function() {
		$("#load_here").load("../admin/php/comm.php");
	}
	document.getElementById('tab2').onclick = function() {
		$("#load_here").load("../admin/php/mu.php", function() {
			elem_supp = document.querySelectorAll(".supprime_user");
			elem_val = document.querySelectorAll(".Vald_user");
			elem_reload = document.querySelectorAll(".reload_user");
			var i = 0;
			while (i < elem_supp.length) {
				elem_supp[i].addEventListener("click", function() {supp_u(this.getAttribute('name'));});
				elem_val[i].addEventListener("click", function() {vald_u(this.getAttribute('name'));});
				elem_reload[i].addEventListener("click", function() {reload_u();});
				i++;
			}

			function supp_u(id) {
				$.post("php/suppr_user.php", {id:id}, function(data) {
					console.log(data);
					if (data == "ok") {
						alert('User supprime');
						$("#tab2").click();
					}
				});
			}

			function vald_u(id) {
				var groupe = document.getElementById(id+'9').value;
				$.post("php/modif_user.php", {id:id, groupe:groupe}, function(data) {
					console.log(data);
					if (data == "ok") {
						alert('User modifie');
						$("#tab2").click();
					}
				});
			}

			function reload_u() {
				$("#tab2").click();
			}

			if (document.getElementById('add_user') != null) {
				document.getElementById('add_user').onclick = function() {
					var name = prompt("Ajouter le nom", "le nom");
					if (name != null) {
						var mail = prompt("Ajouter le mail", "le mail");
						if (mail != null) {
							$.post("php/add_user.php", {name:name, mail:mail}, function(data) {
								if (data == "ok") {
									alert('User creer');
									$("#tab2").click();
								}
							});
						}
					}
				}
			}
		});
	}
	document.getElementById('tab3').onclick = function() {
		$("#load_here").load("../admin/php/mp.php", function () {
			elem_supp = document.querySelectorAll(".supprime");
			elem_val = document.querySelectorAll(".Vald");
			elem_reload = document.querySelectorAll(".reload");
			var i = 0;
			while (i < elem_supp.length) {
				elem_supp[i].addEventListener("click", function() {supp(this.getAttribute('name'));});
				elem_val[i].addEventListener("click", function() {vald(this.getAttribute('name'));});
				elem_reload[i].addEventListener("click", function() {reload();});
				i++;
			}

			function supp(id) {
				$.post("php/supp_prod.php", {id:id}, function(data) {
					if (data == "ok") {
						alert('Article supprime');
						$("#tab3").click();
					}
				});
			}

			function vald(id) {
				var name = document.getElementById(id+'0').value;
				var link_img = document.getElementById(id+'1').value;
				var des = document.getElementById(id+'2').value;
				var cat = document.getElementById(id+'3').value;
				var stock = document.getElementById(id+'4').value;
				var prix = document.getElementById(id+'5').value;
				if (parseInt(prix) > 0 && parseInt(stock) > 0) {
					$.post("php/modif_prod.php", {id:id, name:name, link_img:link_img, des:des, cat:cat, stock:stock, prix:prix}, function(data) {
						if (data == "ok") {
							alert('Article modifie');
							$("#tab3").click();
						}
					});
				}
			}

			function reload() {
				$("#tab3").click();
			}

			if (document.getElementById('add_prod') != null) {
				document.getElementById('add_prod').onclick = function() {
					$.post("php/add_prod.php", function(data) {
						if (data == "ok") {
							alert('Article creer');
							$("#tab3").click();
						}
					});
				}
			}
		});
	}
}