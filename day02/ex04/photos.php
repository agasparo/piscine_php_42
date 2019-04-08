#!/usr/bin/php
<?php
if (count($argv) == 2) {
	$page = file($argv[1]);
	$i = 0;
	$dos = explode('/', $argv[1]);
	if (!file_exists($dos[2])) {
		mkdir($dos[2]);
	}
	while (isset($page[$i])) {
		if (preg_match("#<img src=#", $page[$i])) {
			$src = explode('src=', $page[$i]);
			$lien = explode('"', $src[1]);
			if (preg_match("#http#", $lien[1])) {
				$name = explode('/', $lien[1]);
				$path = $dos[2]."/".$name[count($name) - 1];
				$url=$lien[1];

				$fp = fopen($path, 'w');

				$ch = curl_init($url);
				curl_setopt($ch, CURLOPT_FILE, $fp);
				$data = curl_exec($ch);
				curl_close($ch);
				fclose($fp);
			}
		}
		$i++;
	}
}
?>