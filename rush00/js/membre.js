
	$("#co").click(function() {
		$("#bg_ic").show();
	});
	$("#close_form").click(function() {
		$("#bg_ic").hide();
	});
	$("#coco").click(function(e) {
		e.preventDefault();
		var mail = $("#mail_connect").val();
		var mdp = $("#mdp_connect").val();
		$.post("php/connection.php", {mail:mail, mdp:mdp}, function(data) {
			if (data == "reussi")
				location.reload();
			else
				$("#faute_co").html(data);
		});
	});
	$("#ins").click(function(e) {
		e.preventDefault();
		var pseudo = $("#pseudo_ins").val();
		var mail = $("#mail_ins").val();
		var mdp1 = $("#mdp_ins").val();
		var mdp2 = $("#mdp_re_ins").val();
		$.post("php/inscription.php", {pseudo:pseudo, mail:mail, mdp1:mdp1, mdp2:mdp2}, function(data) {
			$("#faute_ins").html(data);
		});
	});
