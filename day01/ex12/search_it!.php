#!/usr/bin/php
<?php

$i = 2;
while (isset($argv[$i])) {
	$e = explode(':', $argv[$i]);
	$tab[$e[0]] = $e[1];
	$i++;
}
if (isset($tab[$argv[1]]))
	echo $tab[$argv[1]]."\n";
?>
