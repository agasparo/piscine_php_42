<?php
session_start();
if (isset($_SESSION['id']) AND !empty($_SESSION['id'])) {
	$data = file("../../bdd/bdd.cvs");
	$id = count($data);
	$chaine = $id.";undefined;img/undefined;undefined;undefined;0;0\n";
	$data[$id] = $chaine;
	$i = 0;
	file_put_contents("../../bdd/bdd.cvs", "");
	while (isset($data[$i])) {
		file_put_contents("../../bdd/bdd.cvs", $data[$i], FILE_APPEND);
		$i++;
	}
	echo "ok";
}
?>