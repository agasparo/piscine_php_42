<?php

extract($_POST);

$path = explode('/', $file);
$id = explode(';', end($path));
$ex = explode('.', $id[1]);
$name_file = "txt/".$id[0].";".$ex[0].".arg.txt";
$name_file1 = "txt/".$ex[0].";".$id[0].".arg.txt";

if (file_exists($name_file)) {
	echo file_get_contents($name_file);
} else {
	echo file_get_contents($name_file1);
}

if ($sup > 0) {
	if (file_exists($name_file)) {
		file_put_contents($name_file, "");
	} else {
		file_put_contents($name_file1, "");
	}
}
?>