<?php
session_start();
extract($_POST);
if (isset($_SESSION['id']) AND !empty($_SESSION['id'])) {
	$data = file("../../bdd/bdd.cvs");
	unset($data[$id]);
	$data = array_values($data);
	$i = 0;
	file_put_contents("../../bdd/bdd.cvs", "");
	while (isset($data[$i])) {
		$e = explode(";", $data[$i]);
		$e[0] = $i;
		$data[$i] = implode(";", $e);
		file_put_contents("../../bdd/bdd.cvs", $data[$i], FILE_APPEND);
		$i++;
	}
	echo "ok";
}
?>