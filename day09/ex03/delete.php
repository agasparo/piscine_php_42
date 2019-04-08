<?php
extract($_POST);
$file = file("list.csv");
$i = 0;
file_put_contents("list.csv", "");
while (isset($file[$i])) {
	$e = explode(";", $file[$i]);
	if ($e[0] == $id)
		unset($file[$i]);
	$i++;
}
$file = array_values($file);
foreach ($file as $key => $value) {
	$e = explode(";", $file[$key]);
	file_put_contents("list.csv", $key.";".$e[1], FILE_APPEND);
}
?>