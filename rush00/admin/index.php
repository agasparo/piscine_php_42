<?php
session_start();
if (isset($_SESSION['id']) AND !empty($_SESSION['id'])) {
	$data = file("../bdd/membre.cvs");
	$i = 0;
	$co = 0;
	while (isset($data[$i])) {
		$e = explode(";", $data[$i]);
		if ($e[0] == $_SESSION['id'] AND isset($e[4]) AND $e[4] == "admin\n")
			$co = 1;
		$i++;
	}
	if ($co == 1) {
		?>
		<head>
			<title>Panneau de controle</title>
			<meta charset="utf-8">
			<link rel="stylesheet" type="text/css" href="../css/style.css">
		</head>
		<body>
			<div id="navbar-left">
				<p class="nav-title" id="tab1">&#10158; Liste des commandes</p>
				<p class="nav-title" id="tab2">&#10158; Gerer les utilisateurs</p>
				<p class="nav-title" id="tab3">&#10158; Gerer les articles</p>
				<a class="nav-title" href="stats.php" style="text-decoration: none;">&#10158; Statistiques du site</a>
			</div>
			<div align="center"><h1>Bienvenue sur le panneau de controle</h1></div>
			<div id="load_here"></div>
		</body>
		<?php
	} else {
		header("Location:../index.php");
	}
} else {
	header("Location:../index.php");
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="js/index.js"></script>