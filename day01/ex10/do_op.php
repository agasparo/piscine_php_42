#!/usr/bin/php
<?php

if (count($argv) == 4) {
	$nb1 = trim($argv[1]);
	$sign = trim($argv[2]);
	$nb2 = trim($argv[3]);
	if (!is_numeric($nb1) || !is_numeric($nb2))
		exit(0);
	if ($sign == '+')
		echo $nb1 + $nb2."\n";
	if ($sign == '-')
		echo $nb1 - $nb2."\n";
	if ($sign == '*')
		echo $nb1 * $nb2."\n";
	if ($sign == '/' && $nb2 != 0)
		echo $nb1 / $nb2."\n";
	if ($sign == '%' && $nb2 != 0)
		echo $nb1 % $nb2."\n";
} else {
	echo "Incorrect Parameters\n";
}

?>
