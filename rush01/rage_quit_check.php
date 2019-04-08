<?php

extract($_POST);

$path = explode('/', $file);
$id = explode(';', end($path));
$ex = explode('.', $id[1]);
$name_file = "txt/".$id[0].";".$ex[0].".rage.txt";
$name_file1 = "txt/".$ex[0].";".$id[0].".rage.txt";

if (file_exists($name_file)) {
	if (filesize($name_file) != 0) {
	    echo "1";
	}
} else {
	if (filesize($name_file1) != 0) {
	    echo "1";
	}
}
?>