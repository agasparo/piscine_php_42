<?php

echo "\033[35m ---------------------------------------------------------------------------------------\033[0m\n";
echo "\033[35m ---------------------------------------------------------------------------------------\033[0m\n";
echo "\033[35m|                                CREATED by ==> AGASPARO <==                          |\033[0m\n";
echo "\033[35m ---------------------------------------------------------------------------------------\033[0m\n";
echo "\033[35m|                           Testors: lpelissi ceaudouy mascorpi                        |\033[0m\n";
echo "\033[35m----------------------------------------nom_fichier------------------------------------\033[0m\n";


$i = 0;

while ($i < 22) {
	if ($i < 10)
		$dos = "day05/ex0".$i;
	else
		$dos = "day05/ex".$i;
	if (file_exists($dos)) {

		$commande = "ls -a ".$dos;
		if ($i < 10)
			$req = ".\n..\nex0".$i.".sql";
		else
			$req = ".\n..\nex".$i.".sql";
		$rep = shell_exec($commande);
		if (trim($rep) == trim($req)) {
			echo $dos." : \033[32m[Tous les fichiers sont en regles]\033[0m\n";
		} else {
			echo $dos." : \033[31m[Fichier non valide trouve]\033[0m\n";
		}
	} else {
		echo $dos." : \033[31m[Dossier non trouve]\033[0m\n";
	}
	$i++;
}

echo "\033[35m----------------------------------------nom_racine------------------------------------\033[0m\n";

$dir = "day05";
$i = 0;
if (is_dir($dir)){
  if ($dh = opendir($dir)){
    while (($file = readdir($dh)) !== false){
    	if ($file[0] != '.') {
    		if ($file[0] == "e" || $file[1] == "x") {
    			echo $file." : \033[32m[Dossier trouve]\033[0m\n";
    		} else {
    			echo "\033[31m[Le dossier / fichier ".$file." n'est pas valide]\033[0m\n";
    		}
    	}
    }
    closedir($dh);
  }
}

echo "\033[35m----------------------------------------autre------------------------------------\033[0m\n";

$i = 0;

while ($i < 22) {
	if ($i < 10)
		$dos = "day05/ex0".$i."/ex0".$i.".sql";
	else
		$dos = "day05/ex".$i."/ex".$i.".sql";
	$get_content = file($dos);
	if ($get_content[0][strlen($get_content[0]) - 1] != ';') {
		echo $dos." : \033[31m[Il manque le point virgule a la fin]\033[0m\n";
	} else {
		echo $dos." : \033[32m[tout est bon]\033[0m\n";
	}
	$i++;
}

?>