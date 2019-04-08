#!/usr/bin/php
<?php
if (count($argv) > 1) {
	$i = 1;
	while (isset($argv[$i])) {
		$chaine = preg_replace("# +#", " ",$argv[$i]);
		$chaine = trim($chaine);
		$all = $all.' '.$chaine; 
		$i++;
	}
	$all = trim($all);
	$tab = explode(' ', $all);
	sort($tab);
	$i = 0;
	while (isset($tab[$i])) {
		echo $tab[$i]."\n";
		$i++;
	}
}

?>
