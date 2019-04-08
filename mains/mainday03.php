#!/usr/bin/php
<?php

echo "\033[35m ---------------------------------------------------------------------------------------\033[0m\n";
echo "\033[35m ---------------------------------------------------------------------------------------\033[0m\n";
echo "\033[35m|                                CREATED by ==> AGASPARO <==                          |\033[0m\n";
echo "\033[35m ---------------------------------------------------------------------------------------\033[0m\n";
echo "\033[35m|                           Testors: lpelissi ceaudouy mascorpi                        |\033[0m\n";
echo "\033[35m----------------------------------------nom_fichier------------------------------------\033[0m\n";


$i = 0;
$tab[0] = 'D03.conf';
$tab[1] = 'phpinfo.php';
$tab[2] = 'print_get.php';
$tab[3] = 'cookie_crisp.php';
$tab[4] = 'raw_text.php';
$tab[5] = 'read_img.php';
$tab[6] = 'members_only.php';


while ($i < 7) {
		$commade = "day03/ex0".$i."/".$tab[$i];
	if (file_exists($commade)) {
		echo "Fichier ".$tab[$i]." : \033[32m[OK]\033[0m\n";
	} else {
		echo "Fichier ".$tab[$i]." : \033[31m[non trouve]\033[0m\n";
	}
	$i++;
}


echo "Lancement du script de correction dans 3 secondes ...\n";
$ch = str_replace("\n", "", shell_exec("pwd"))."/day03";
$c = explode("/", $ch);
unset($c[0]);
unset($c[1]);
unset($c[2]);
$c = array_values($c);
$ch = implode("/", $c);
sleep(3);
sleep(0.5);

echo "\033[35m-------------------------------------------ex02------------------------------------\033[0m\n";
echo "test 1 :";
$req = shell_exec("curl 'localhost:8100/".$ch."/ex02/print_get.php?login=mmontinet'");
if ($req == "login: mmontinet\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "Ta reponse : ".$req."\nLa reponse attendue: login: mmontinet\n";
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 2 :";
$req = shell_exec("curl 'localhost:8100/".$ch."/ex02/print_get.php?gdb=pied2biche&barry=barreamine'");
$rep = "gdb: pied2biche\nbarry: barreamine\n";
if ($req == $rep) {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "Ta reponse : ".$req."\nLa reponse attendue: ".$rep;
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "\033[35m-------------------------------------------ex03------------------------------------\033[0m\n";

echo "test 1 :";
shell_exec("curl -c cook.txt 'localhost:8100/".$ch."/ex03/cookie_crisp.php?action=set&name=plat&value=choucroute'");
$req = shell_exec("curl -b cook.txt 'localhost:8100/".$ch."/ex03/cookie_crisp.php?action=get&name=plat'");
if ($req == "choucroute\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "Ta reponse : ".$req."\nLa reponse attendue: choucroute\n";
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 2 :";
shell_exec("curl -c cook.txt 'localhost:8100/".$ch."/ex03/cookie_crisp.php?action=del&name=plat'");
$req = shell_exec("curl -b cook.txt 'localhost:8100/".$ch."/ex03/cookie_crisp.php?action=get&name=plat'");
$rep = "";
if ($req == $rep) {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "Ta reponse : ".$req."\nLa reponse attendue: ".$rep;
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "\033[35m-------------------------------------------ex04------------------------------------\033[0m\n";
echo "test 1 :";
$html = "<html><body>Hello</body></html>";

$req = shell_exec("curl 'localhost:8100/".$ch."/ex04/raw_text.php'");
if ($req == $html) {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "Ta reponse : ".$req."\nLa reponse attendue: ".$html;
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "\033[35m-------------------------------------------ex05------------------------------------\033[0m\n";

echo "test 1 : ";
$req = shell_exec(" curl --head localhost:8100/".$ch."/ex05/read_img.php");
if (preg_match("#Content-type: image/png#", $req) || preg_match("#content-type: image/png#", $req) || preg_match("#Content-Type: image/png#", $req)) {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "Ta reponse : ".$req."\nLa reponse attendue: (il doit y avoir content-type: image/png dans ton retour)";
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "\033[35m-------------------------------------------ex06------------------------------------\033[0m\n";

echo "test 1 : ";

$data = file_get_contents("day03/img/42.png");
$base64 = 'data:image/png;base64,'.base64_encode($data);

$req = shell_exec("curl --user zaz:jaimelespetitsponeys localhost:8100/".$ch."/ex06/members_only.php");
$req = str_replace("<html><body>
Bonjour Zaz<br />
<img src='", "", $req);
$req = str_replace("'>
</body></html>", "", $req);

if (trim($req) == trim($base64)) {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "Ta reponse : ".$req."\nLa reponse attendue: ".$base64;
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 2 : ";
$req = shell_exec("curl -v --user root:root localhost:8100/".$ch."/ex06/members_only.php 2>&1");
if (preg_match("#<html><body>Cette zone est accessible uniquement aux membres du site</body></html>#", $req)) {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "Ta reponse : ".$req."\nLa reponse attendue: il doit y avoir (<html><body>Cette zone est accessible uniquement aux membres du site</body></html>) dans ton retour";
	echo "\033[31m[FAUX]\033[0m\n";
}

exec("rm -rf cook.txt");