<?php
date_default_timezone_set('Europe/Paris');
if (!file_exists("private"))
	mkdir("private");
if (!file_exists('private/chat')) {
	$fd = fopen('private/chat', "w+");
	fclose($fd);
}
$file = unserialize(file_get_contents('private/chat'));
$i = 0;
while (isset($file[$i])) {
	echo "[".date('H:i', $file[$i]['time'])."] <b>".$file[$i]['login']."</b>: ".$file[$i]['msg']."<br />";
	$i++;
}
?>