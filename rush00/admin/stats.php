<?php
session_start();
?>
<html>
<head>
	<title>Statistiques du site</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
</head>
<body>
	<div id="navbar-left">
		<p class="nav-title" id="tab2"></p>
		<a class="nav-title" href="index.php" style="text-decoration: none;">&#10158; Acceuil</a>
	</div>
	<div align="center"><h1>Bienvenue sur la page de statistiques du site</h1></div>
	<div id="load_here">
		<h2>Ton site en quelques chiffres : </h2>
		<?php

		function nb_article($data) {
			$i = 0;
			$count = 0;
			$utilisateur = 0;
			while (isset($data[$i])) {
				$inf = explode(";", $data[$i]);
				$a = 0;
				while (isset($inf[$a])) {
					if ($a % 3 == 0 AND !preg_match("#\n#", $inf[$a]) && is_numeric($inf[$a])) {
						$count = $count + intval($inf[$a]);
						$utilisateur++;
					}
					$a++;
				}
				$i++;
			}
			if ($utilisateur == 0)
				$utilisateur = 1;
			echo "<h4>- ".$count." articles achetes<br>";
			echo "- ".$utilisateur." utilisateur(s) qui ont achete<br>";
			echo "- Moyenne de ".($count / $utilisateur)." article(s) par utilisateur(s)</h4>";
		}

		function articles_pref($data) {
			$i = 0;
			$count = 0;
			while (isset($data[$i])) {
				$inf = explode(";", $data[$i]);
				$a = 0;
				while (isset($inf[$a])) {
					if ($a % 6 == 0 AND !preg_match("#\n#", $inf[$a])) {
						if (isset($tab[$inf[$a]]))
							$tab[$inf[$a]] = $inf[$a + 3] + $tab[$inf[$a]];
						else
							$tab[$inf[$a]] = $inf[$a + 3];
					}
					$a++;
				}
				$i++;
			}
			arsort($tab);
			foreach ($tab as $key => $value) {
				$infs = $infs."'".$key."', ";
				$val = $val."'".$value."', ";
			}
			$infs[strlen($infs) - 2] = str_replace(",", "],", $infs[strlen($infs) - 2]);
			$infs = "labels: [".$infs;
			$infs = trim($infs).",";
			$val[strlen($val) - 2] = str_replace(",", "],", $val[strlen($val) - 2]);
			$val = "data: [".$val;
			$val = trim($val).",";
			if (file_exists("js/graph.js"))
				unlink("js/graph.js");
			$fd = fopen("js/graph.js", "w+");
			$data = "var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
    	".$infs."
    	datasets: [{
            label: 'Nombres de ventes',
            ".$val."
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 159, 60, 0.2)',
                'rgba(255, 159, 50, 0.2)',
                'rgba(255, 159, 40, 0.2)',
                'rgba(255, 159, 30, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 159, 60, 0.2)',
                'rgba(255, 159, 50, 0.2)',
                'rgba(255, 159, 40, 0.2)',
                'rgba(255, 159, 30, 0.2)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});";
			fwrite($fd, $data);
			fclose($fd);
			}

			function panier_moyen($data) {
				?><h2>Valeur d'un panier moyen : </h2><?php
				$i = 0;
				$count = 0;
				while (isset($data[$i])) {
					$inf = explode(";", $data[$i]);
					$a = 0;
					while (isset($inf[$a])) {
						if ($a % 6 == 0 AND !preg_match("#\n#", $inf[$a])) {
							if (!isset($tab[$inf[$a]])) {
								$count++;
							}
							$tab[$inf[$a]] = $inf[$a + 4];
						}
						$a++;
					}
					$i++;
				}
				$i = 0;
				if ($count == 0)
					$count = 1;
				foreach ($tab as $key => $value) {
					$i = $i + $value;
				}
				echo "<h4> - Prix de tous les paniers : ".$i." €<br>";
				echo " - Panier moyen : ".($i / $count)." €</h4><br>";
				?><h2>Tableau des articles les plus vendus : </h2><?php
			}


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
					$data = file("../bdd/commande_valide.cvs");
					nb_article($data);
					echo "<br>";
					articles_pref($data);
					echo "<br>";
					panier_moyen($data);
				} else {
					header("Location:../index.php");
				}
			} else {
				header("Location:../index.php");
			}


			?>
		</div>
<canvas id="myChart"></canvas>
<script src="js/graph.js"></script>

	</html>