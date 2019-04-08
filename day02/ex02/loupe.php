#!/usr/bin/php
<?php
	if (count($argv) == 2 AND file_exists($argv[1])) {
		$fichier = trim($argv[1]);
		$ligne = file($fichier);
		$i = 0;
		while (isset($ligne[$i])) {
			if (preg_match("#<a href=#", $ligne[$i])) {
				$chaine = explode('>', $ligne[$i]);
				$a = 0;
				while (isset($chaine[$a])) {
					if (preg_match("#title=#", $chaine[$a])) {
						$title = explode('"', $chaine[$a]);
						$title[1] = strtoupper($title[1]);
						$chaine[$a] = implode('"', $title);
					}
					if (isset($chaine[$a - 1])) {
						if (preg_match("#<a href=#", $chaine[$a - 1])) {
							$text = explode('<', $chaine[$a]);
							$text[0] = strtoupper($text[0]);
							$chaine[$a] = implode('<', $text);
						}
					}
					$a++;
				}
				$ligne[$i] = implode('>', $chaine);
			}
			echo $ligne[$i];
			$i++;
		}
	} else {
		echo "\n";
	}
?>