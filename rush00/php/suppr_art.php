<?php
extract($_POST);
$bdd = "../bdd/bdd.cvs";
$data = file("../bdd/pann.cvs");
$i = 0;
while (isset($data[$i])) {
	$e = explode(";", $data[$i]);
	$e[1] = str_replace("\n", "", $e[1]);
	if ($e[0] == $id AND $e[1] == $id_user) {
		unset($data[$i]);
		break;
	}
	$i++;
}
$data = array_values($data);
$i = 0;
file_put_contents("../bdd/pann.cvs", "");
while (isset($data[$i])) {
	file_put_contents("../bdd/pann.cvs", $data[$i], FILE_APPEND);
	$i++;
}

$return = file($bdd);
$change = explode(";", $return[$id]);
$change[5] = $change[5] + 1;
$return[$id] = implode(";", $change);
file_put_contents($bdd, "");
$i = 0;
while (isset($return[$i])) {
	file_put_contents($bdd, $return[$i], FILE_APPEND);
	$i++;
}
?>