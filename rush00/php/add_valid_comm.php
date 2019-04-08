<?php
session_start();
if (isset($_SESSION['id']) AND !empty($_SESSION['id'])) {
	$i = 1;
	while (isset($_SESSION['commande'][$i])) {
		file_put_contents("../bdd/commande_valide.cvs", $_SESSION['commande'][$i].";".$_SESSION['id'].";", FILE_APPEND);
		$i++;
	}
	file_put_contents("../bdd/commande_valide.cvs", "\n", FILE_APPEND);
	$data = file("../bdd/pann.cvs");
	$i = 0;
	while (isset($data[$i])) {
		$e = explode(";", $data[$i]);
		$e[1] = str_replace("\n", "", $e[1]);
		if ($e[1] == $_SESSION['id']) {
			unset($data[$i]);
		}
		$i++;
	}
	$data = array_values($data);
	$i = 0;
	file_put_contents("../bdd/pann.cvs", "");
	while (isset($data[$i])) {
		file_put_contents("../bdd/pann.cvs", $data[$i]."\n", FILE_APPEND);
		$i++;
	}
}
?>