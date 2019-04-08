<?php

function ft_is_sort($tab) {
	$tab1 = $tab;
	sort($tab1);
	$tab2 = $tab;
	rsort($tab2);
	$i = 0;
	while (isset($tab[$i]) AND $tab[$i] == $tab[$i + 1])
		$i++;
	if ($i + 1 == count($tab))
		return (1);
	if ($tab[$i] > $tab[$i + 1]) {
		while (isset($tab[$i])) {
			if ($tab[$i] != $tab2[$i])
				return (0);
			$i++;
		}
		return (1);
	}
	if ($tab[$i] < $tab[$i + 1]) {
		while (isset($tab[$i])) {
			if ($tab[$i] != $tab1[$i])
				return (0);
			$i++;
		}
		return (1);
	}
}
?>
