function cine_deb() {
	var audio = new Audio('music/cine1.mp3');
	audio.loop = true;
	audio.play();
	document.getElementById('cine').style.display = 'block';
	var texts = new Array();
	var img = new Array();
	$("#text").html("Malgre de nombreux cataclysmes, nous avons toujours reussis a nous relever");
	$("#img_cine").attr('src', "img/cine1_img1.jpg");
	texts[0] = "Mais l'histoire des ces guerres restes floues";
	texts[1] = "Aujourd'hui, Terra est encore une fois menacee";
	texts[2] = "Mais cette fois, je sais pas si nous nous releverons...";
	texts[3] = "Les Orks ont arretes leurs menaces et passent a l'offensive";
	texts[4] = "Maintenant c'est a vous d'ecrire l'histoire...";
	img[0] ="img/cine1_img6.jpg";
	img[1] ="img/cine1_img2.jpg";
	img[2] ="img/cine1_img3.jpg";
	img[3] ="img/cine1_img4.jpg";
	img[4] ="img/cine1_img5.jpg";
	var i = 0;
	let timerId = setInterval(() => i = replace_text(texts[i], i, img[i]), 4000);
	setTimeout(() => { clearInterval(timerId); fin(0, audio); }, 24000);
}

function cine_mort_co(nom1, nom2) {
	document.getElementById('cine').style.display = 'block';
	document.getElementById('cine').style.zIndex = 200;
	var text = new Array();
	var img = new Array();
	$("#text").html("...");
	$("#img_cine").attr('src', "img/cine2_img2.jpg");
	text[0] = "...";
	text[1] = nom1+" : Un missile arrive sur nous !!!";
	text[2] = nom1+" : Il provient de ... "+nom2+" ???";
	text[3] = "Radio notre allier nous tire dessus il va nous tuer !!";
	text[4] = "AAAAAAAHHHHHHHH !!!!!!!!!!";
	img[0] ="img/cine2_img2.jpg";
	img[1] ="img/cine2_img1.jpg";
	img[2] ="img/cine2_img1.jpg";
	img[3] ="img/cine2_img4.jpg";
	img[4] ="img/cine2_img6.jpg";
	var i = 0;
	let timerId = setInterval(() => i = replace_text(text[i], i, img[i]), 4000);
	setTimeout(() => { clearInterval(timerId); fin(0); }, 24000);
}

function cine_fin_homme() {
	var audio = new Audio('music/cine_homme.mp3');
	audio.pause();
	audio.play();
	document.getElementById('cine').style.display = 'block';
	document.getElementById('cine').style.zIndex = 200;
	var text = new Array();
	var img = new Array();
	$("#text").html("La guerre a ete difficile ...");
	$("#img_cine").attr('src', "img/cine4_img1.jpg");
	text[0] = "Malgre de lourdes pertes des heros sont nes";
	text[1] = "Notre Terra est a reconstruire";
	text[2] = "L'humanite en sort encore une fois vainqueure grace a notre empereur";
	text[3] = "Mais encore un enemi existe ...";
	text[4] = "Fin";
	img[0] ="img/cine4_img12.jpg";
	img[1] ="img/cine4_img3.jpg";
	img[2] ="img/cine4_img4.jpeg";
	img[3] ="img/cine4_img5.jpg";
	img[4] ="img/cine2_img4.jpg";
	var i = 0;
	let timerId = setInterval(() => i = replace_text(text[i], i, img[i]), 4000);
	setTimeout(() => { clearInterval(timerId); fin(1, audio); }, 24000);
}

function cine_fin_orks() {
	var audio = new Audio('music/cine_orks.mp3');
	audio.pause();
	audio.play();
	document.getElementById('cine').style.display = 'block';
	document.getElementById('cine').style.zIndex = 200;
	var text = new Array();
	var img = new Array();
	$("#text").html("AAAAAAAHHHHHHHHH !!!!!!");
	$("#img_cine").attr('src', "img/collision.jpg");
	text[0] = "Notre dernier espoire s'etein ...";
	text[1] = "La soumision des humains commence ...";
	text[2] = "Notre liberte est perdu ...";
	text[3] = "Pourrons nous la retrouver ??";
	text[4] = "Fin";
	img[0] ="img/cine3_img1.jpg";
	img[1] ="img/cine3_img2.jpg";
	img[2] ="img/cine2_img4.jpg";
	img[3] ="img/cine3_img4.jpeg";
	img[4] ="img/cine2_img4.jpg";
	var i = 0;
	let timerId = setInterval(() => i = replace_text(text[i], i, img[i]), 4000);
	setTimeout(() => { clearInterval(timerId); fin(1, audio); }, 24000);
}

function replace_text(text, i, img) {
	$("#text").fadeOut('slow', function(){
		$("#img_cine").fadeOut('slow', function(){
			$("#img_cine").attr('src', img);
			$("#img_cine").fadeIn('slow');
			$("#text").html(text);
			$("#text").fadeIn('slow');
		});
	});
	i++;
	return(i);
}

function cine_credit() {
	document.getElementById('cine').style.display = 'block';
	document.getElementById('cine').style.zIndex = 200;
	$("body").append("<h1 style='position: fixed; top: 25%; width:100%; font-family: fantasy; text-align: center;color: white; z-index:400;'>Merci d'avoir joue</h1>"+
		"<br><h2 style='position: fixed; top: 30%; width:100%; font-family: fantasy; text-align: center;color: white; z-index:400;'>Musiques : <br>"+
		"<p style='position: fixed; top: 33%; width:100%; font-family: fantasy; text-align: center;color: white; z-index:400;'><br>"+
		"Intro : <a href='https://www.youtube.com/watch?v=7akFvWEVUCc'>Diablo 3 The Eternal Conflict</a><br>"+
		"In game : <a href='https://www.youtube.com/watch?v=4J7K3yacig4'>One piece</a><br>"+
		"Final homme : <a href='https://www.youtube.com/watch?v=PGjdCiyVBd8&t=14s'>Death note theme de l</a><br>"+
		"Final Orks : <a href='https://www.youtube.com/watch?v=yuz3RAcDG6M'>Death note Low of solipsism</a><br>"+
		"Fait par : agasparo</p>");
}

function fin(val, audio) {

	if (audio != null) {
		var vol = 0.40;
		var interval = 300;

		var fadeout = setInterval(
		function() {
			if (vol > 0.05) {
				vol -= 0.05;
				audio.volume = vol;
			} else {
				clearInterval(fadeout);
				audio.pause();
			}
		}, interval);
	}
	if (val != 1)
		$("#cine").fadeOut('slow');
	else
		cine_credit();
}