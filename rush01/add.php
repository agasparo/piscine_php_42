<?php
session_start();

extract($_POST);

$file = "queue.cvs";
$data = file($file);
$i = 0;
$new = 0;
$nom = $_SESSION['id'];

while (isset($data[$i])) {
	if ($data[$i] == $nom."\n")
		$new++;
	$i++;
}
if ($new == 0) {
	file_put_contents($file, $nom."\n", FILE_APPEND);
} else if ($i >= 2) {
	$i = 0;
	while (isset($data[$i])) {
		if ($data[$i] == $nom."\n") {
			break;
		}
		$i++;
	}
	if ($i > 0) {
		$j[0] = $data[$i - 1];
		$j[1] = $data[$i];
		unset($data[$i - 1]);
		unset($data[$i]);
	} else {
		$j[0] = $data[$i + 1];
		$j[1] = $data[$i];
		unset($data[$i + 1]);
		unset($data[$i]);
	}
	echo $j[0].";".$j[1];
}
?>