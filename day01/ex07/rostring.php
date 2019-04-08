#!/usr/bin/php
<?php
if (count($argv) > 1) {
	$tab = explode(' ', $argv[1]);
	$tab[count($tab)] = $tab[0];
	unset($tab[0]);
	array_values($tab);
	echo $chaine = trim(implode(' ', $tab))."\n";
}
?>
