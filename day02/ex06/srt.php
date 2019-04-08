#!/usr/bin/php
<?php
if (count($argv) == 2) {
	if (file_exists($argv[1])) {
		$file = file_get_contents($argv[1]);
		$tab = explode("\n", $file);
		$index = 1;
		$i = 0;
		while (isset($tab[$index])) {
			$date[$i] = $tab[$index];
			$date[$i + 1] = $tab[$index + 1];
			$index = $index + 4;
			$i = $i + 2;
		}
		$i = 0;
		while (isset($date[$i])) {
			$j = 0;
			while (isset($date[$j])) {
				$d = explode(' --> ', $date[$j]);
				$d1 = explode(' --> ', $date[$i]);
				if ($d[0] > $d1[0]) {
					$e = $d[0];
					$d[0] = $d1[0];
					$d1[0] = $e;
					$e = $d[1];
					$d[1] = $d1[1];
					$d1[1] = $e;
					$e = $date[$i + 1];
					$date[$i + 1] = $date[$j + 1];
					$date[$j + 1] = $e;
					$date[$j] = implode(' --> ', $d);
					$date[$i] = implode(' --> ', $d1);
				}
				$j = $j + 2;
			}
			$i = $i + 2;
		}
		$i = 0;
		$a = 1;
		while (isset($date[$i])) {
			if ($i % 2 == 0) {
				echo $a."\n";
				$a++;
			}
			if (ctype_alpha($date[$i]) AND isset($date[$i + 1]))
				echo $date[$i]."\n"."\n";
			else 
				echo $date[$i]."\n";
			$i++;
		}
	}
}
?>