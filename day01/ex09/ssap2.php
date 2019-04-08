#!/usr/bin/php
<?php

function    my_sort($s1, $s2)
{
	$cmp = "abcdefghijklmnopqrstuvwxyz0123456789!\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
	$c1 = strtolower($s1);
	$c2 = strtolower($s2);
	$i = 0;
	while (($i < strlen($s1)) || ($i < strlen($s2)))
	{
		if (empty($c1[$i]))
			return (-1);
		if (empty($c2[$i]))
			return (1);
		$sc1 = strpos($cmp, $c1[$i]);
		$sc2 = strpos($cmp, $c2[$i]);
		if ($sc1 < $sc2)
			return (-1);
		else if ($sc1 > $sc2)
			return (1);
		else
			$i++;
	}
	return (0);
}

if (count($argv) > 1) {
	$i = 1;
	$z = 0;
	while (isset($argv[$i])) {
		$chaine = preg_replace("# +#", " ",$argv[$i]);
		$chaine = trim($chaine);
		$chaines = explode(' ', $chaine);
		$a = 0;
		while (isset($chaines[$a])) {
			if (is_numeric($chaines[$a][0]))
				$tab1[$z] = $chaines[$a];
			else if (ctype_alnum($chaines[$a][0]))
				$tab2[$z] = $chaines[$a];
			else
				$tab3[$z] = $chaines[$a];
			$z++;
			$a++;
		}
		$i++;
	}
	array_values($tab1);
	array_values($tab2);
	array_values($tab3);
	usort($tab1, "my_sort");
	usort($tab2, "my_sort");
	usort($tab3, "my_sort");
	$tab = array_merge($tab2, $tab1, $tab3);
	$i = 0;
	while (isset($tab[$i])) {
		echo $tab[$i]."\n";
		$i++;
	}
}

?>
