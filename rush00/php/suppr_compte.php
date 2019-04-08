<?php
session_start();
if (isset($_SESSION['id']) AND !empty($_SESSION['id'])) {
	$data = file("../bdd/membre.cvs");
	$i = 0;
	while (isset($data[$i])) {
		$e = explode(";", $data[$i]);
		if ($e[0] == $_SESSION['id']) {
			$data[$i] = $e[0]."\n";
		}
		$i++;
	}
	$data = array_values($data);
	$i = 0;
	file_put_contents("../bdd/membre.cvs", "");
	while (isset($data[$i])) {
		file_put_contents("../bdd/membre.cvs", $data[$i], FILE_APPEND);
		$i++;
	}
	header("Location:deconnection.php");
}
?>