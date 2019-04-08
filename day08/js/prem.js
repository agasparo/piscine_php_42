window.onload = function() {
	var btn = document.getElementById('btn-btn');
	var tele = document.getElementById('autre');
	var text_tele = document.getElementById('telep');
	var i = 0;

	if (localStorage.getItem("instal") == 1)
		btn.innerHTML = "<p>Lancer</p>";

	btn.onclick = function() {
		if (localStorage.getItem("instal") == 1) {
			window.location = "main.php";
		} else {
			btn.innerHTML = "<p>Telechargement ...</p>";
			ins();
		}
	}

	function ins() {
		tele.style.display = 'block';
		text_tele.innerHTML = "Initialisation ... ( "+i+" % )";
		let telechargement = setInterval(myTimer, 1500);
		function myTimer() {
			document.getElementById('progress').style.width = i+"%";
			text_tele.innerHTML = "Telechargement ... ( "+i+" % )";
			i = i + Math.floor((Math.random() * 20) + 1);
			if (i > 100) {
				document.getElementById('progress').style.width = "100%";
				text_tele.innerHTML = "Telechargement ... ( 100 % )";
				btn.innerHTML = "<p>Installation ...</p>";
				clearInterval(telechargement);
				final();
			}
		}
	}

	function final() {
		i = 0;
		document.getElementById('progress').style.width = "0%";
		tele.style.display = 'block';
		text_tele.innerHTML = "Initialisation ... ( "+i+" % )";
		let Installation = setInterval(myTimer, 1500);
		function myTimer() {
			document.getElementById('progress').style.width = i+"%";
			text_tele.innerHTML = "Installation ... ( "+i+" % )";
			i = i + Math.floor((Math.random() * 20) + 1);
			if (i > 100) {
				document.getElementById('progress').style.width = "100%";
				text_tele.innerHTML = "Installation ... ( 100 % )";
				btn.innerHTML = "<p>Lancer</p>";
				clearInterval(Installation);
				localStorage.setItem("instal", 1);
				setTimeout(function() {
					tele.style.display = 'none';
				}, 2000);
			}
		}
	}
};