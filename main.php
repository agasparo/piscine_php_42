<?php

echo "\033[35m ---------------------------------------------------------------------------------------\033[0m\n";
echo "\033[35m |                                   PHP-file-checker                                  |\033[0m\n";
echo "\033[35m ---------------------------------------------------------------------------------------\033[0m\n";
echo "\033[35m|                                CREATED by ==> AGASPARO <==                           |\033[0m\n";
echo "\033[35m ---------------------------------------------------------------------------------------\033[0m\n";
echo "\033[35m|                           Testors: lpelissi ceaudouy mascorpi                        |\033[0m\n";
echo "\033[35m----------------------------------------nom_fichier------------------------------------\033[0m\n";
echo "\n";

$tab_day  = ["day01", "day02", "day03", "day04", "day06", "day07"];

echo "Liste des jours valables : \n";

foreach ($tab_day as $key => $value) {
	echo "\033[35m -> ".$value."\033[0m\n";
}

shell_exec('open -a "/Applications/Utilities/Terminal.app" "./serv.sh" &');
$pid = shell_exec("ps -A | grep -m1 Terminal | awk '{print $1}'");
$a = 0;
while(1) {
	if ($a == 1) {
		echo "Liste des jours valables :\n";
		foreach ($tab_day as $key => $value) {
			echo "\033[35m -> ".$value."\033[0m\n";
		}
	}
	echo "Choisissez un jour: ";
	$choix = trim(fgets(STDIN));
	if ($choix == "exit") {
		shell_exec("kill ".$pid);
		echo "\n";
		exit();
	}
	if ($choix == "clear") {
		echo shell_exec("clear");
	} else if (in_array($choix, $tab_day)) {
		$a = 1;
		$name_main = "mains/main".$choix.".php";
		shell_exec("chmod 755 ".$name_main);
		$commande = "php ".$name_main." > trace/trace_".$choix;
		if ($choix == "day03")
			sleep(3);
		echo "\033[32m[main en cours d'execution ...]\033[0m\n";
		shell_exec($commande);
		echo shell_exec("cat trace/trace_".$choix);
		echo "\033[32m[main fini]\033[0m\n";
		if ($choix == "day02") {
			shell_exec("rm -rf page.html");
			shell_exec("rm -rf www.42.fr");
		}
	} else {
		echo "\033[31mPHP-file-checker ne teste pas ce jour\033[0m\n";
	}
}

?>
