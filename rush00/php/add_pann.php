<?php
session_start();
if (isset($_SESSION['id']) AND !empty($_SESSION['id'])) {
	$util = $_SESSION['id'];
} else {
	$util = $_SESSION['in'];
}
extract($_POST);
file_put_contents("../bdd/pann.cvs", $id.";".$util."\n", FILE_APPEND);
$bdd = "../bdd/bdd.cvs";
$data = file($bdd);
$change = explode(";", $data[$id]);
$change[5] = $change[5] - 1;
$data[$id] = implode(";", $change);
file_put_contents($bdd, "");
$i = 0;
while (isset($data[$i])) {
	file_put_contents($bdd, $data[$i], FILE_APPEND);
	$i++;
}

?>