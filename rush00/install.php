<?php

$fichier[0] = "bdd.cvs";
$fichier[1] = "commande_valide.cvs";
$fichier[2] = "membre.cvs";
$fichier[3] = "pann.cvs";

$i = 0;
while (isset($fichier[$i])) {
	if (!file_exists("bdd/".$fichier[$i])) {
		echo "Creation du fihcier ".$fichier[$i]." dans le dossier bdd<br/>";
		$fd = fopen("bdd/".$fichier[$i], "w+");
		fclose($fd);
	} else {
		echo "Le fichier ".$fichier[$i]." est deja créé<br>";
	}
	$i++;
}

?>