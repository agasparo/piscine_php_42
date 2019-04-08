#!/usr/bin/php
<?php
function moyenne($data) {
	
	$i = 0;
	$total = 0;
	$count = 0;
	while (isset($data[$i])) {
		if (!preg_match("#moulinette#", $data[$i])) {
			$d = explode(';', $data[$i]);
			if (isset($d[1]) AND is_numeric($d[1])) {
				$total = $total + $d[1];
				$count++;
			}
		}
		$i++;
	}
	echo $total / $count."\n";
}

function moyenne_user($data) {
	sort($data);

	$i = 0;
	$a = 0;
	$name = array();
	while (isset($data[$i])) {
		$d = explode(';', $data[$i]);
		if (!in_array($d[0], $name)) {
			$name[$a] = $d[0];
			$a++;
		}
		$i++;
	}
	$i = 0;

	while (isset($name[$i])) {
		$a = 0;
		$rep[$name[$i]] = 0;
		$count = 0;
		while (isset($data[$a])) {
			$d = explode(';', $data[$a]);
			if (trim($name[$i]) == trim($d[0]) AND trim($d[2]) != "moulinette" AND is_numeric($d[1])) {
				$rep[$name[$i]] = $rep[$name[$i]] + $d[1];
				$count++;
			}
			$a++;
		}
		$rep[$name[$i]] = $rep[$name[$i]] / $count;
		$i++;
	}
	foreach($rep as $cle => $valeur){
		if (isset($valeur) AND !empty($valeur)) {
			echo $cle.':'.$valeur."\n";
		}
	}
}

function ecart_moulinette($data) {
	sort($data);
	$i = 0;
	$a = 0;
	$name = array();
	while (isset($data[$i])) {
		$d = explode(';', $data[$i]);
		if (!in_array($d[0], $name)) {
			$name[$a] = $d[0];
			$a++;
		}
		$i++;
	}
	$i = 0;
	$notes = array();
	while (isset($name[$i])) {
		$a = 0;
		while (isset($data[$a])) {
			$d = explode(';', $data[$a]);
			if (preg_match("#moulinette#", $data[$a])) {
				if (isset($d[1]) AND is_numeric($d[1]) AND $name[$i] == $d[0])
					$note_moul[$name[$i]] = $d[1];
			} else if ($name[$i] == $d[0] AND is_numeric($d[1]))  {
				$notes[$name[$i]] = $notes[$name[$i]].','.$d[1];
			}
			$a++;
		}
		$i++;
	}
	foreach($note_moul as $cle => $valeur) {
		$note = explode(',', $notes[$cle]);
		$i = 1;
		$ecarts = 0;
		while (isset($note[$i]) AND is_numeric($note[$i])) {
			$ecarts = $ecarts + ($note[$i] - $note_moul[$cle]);
			$i++;
		}
		if ((count($note) - 1) > 0) {
			$moyenne_final = $ecarts / (count($note) - 1);
			echo $cle.':'.$moyenne_final."\n";
		}
	}
}

if (count($argv) == 2) {
	$line = "l";
	$i = 0;
	while(!empty($line))
	{
		$line = trim(fgets(STDIN));
		if ($i > 0)
			$data[$i - 1] = $line;
		$i++;
	}
	unset($data[count($data) - 1]);
	if ($argv[1] == 'moyenne')
		moyenne($data);
	else if($argv[1] == 'moyenne_user')
		moyenne_user($data);
	else if($argv[1] == 'ecart_moulinette')
		ecart_moulinette($data);
	else
		exit(0);
}
?>