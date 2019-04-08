#!/usr/bin/php
<?php
while(1) {
	echo "Entrez un nombre: ";
	$number = trim(fgets(STDIN));
	if (feof(STDIN) == TRUE) {
		echo "\n";
		exit();
	}
	if (is_numeric($number)) {
		if ($number[strlen($number) - 1] % 2 == 0)
			echo "Le chiffre ".$number." est Pair\n";
		else
			echo "Le chiffre ".$number." est Impair\n";
	} else {
		echo "'".$number."' n'est pas un chiffre\n";
	}
}
?>
