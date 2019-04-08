<?php

echo "\033[35m ---------------------------------------------------------------------------------------\033[0m\n";
echo "\033[35m ---------------------------------------------------------------------------------------\033[0m\n";
echo "\033[35m|                                CREATED by ==> AGASPARO <==                          |\033[0m\n";
echo "\033[35m ---------------------------------------------------------------------------------------\033[0m\n";
echo "\033[35m|                           Testors: lpelissi ceaudouy mascorpi                        |\033[0m\n";
echo "\033[35m----------------------------------------nom_fichier------------------------------------\033[0m\n";

$i = 0;
$tab[0] = 'Tyrion.class.php';
$tab[1] = 'Greyjoy.class.php';
$tab[2] = 'Targaryen.class.php';
$tab[3] = 'House.class.php';
$tab[4] = 'Lannister.class.php|Jaime.class.php|Tyrion.class.php';
$tab[5] = 'NightsWatch.class.php|IFighter.class.php';
$tab[6] = 'UnholyFactory.class.php|Fighter.class.php';


while ($i < 7) {
	$e = explode("|", $tab[$i]);
	$a = 0;
	echo "Ex ".$i." : \n";
	while (isset($e[$a])) {
		$commade = "day07/ex0".$i."/".$e[$a];
		if (file_exists($commade)) {
			echo "\tFichier ".$e[$a]." : \033[32m[OK]\033[0m\n";
		} else {
			echo "\tFichier ".$e[$a]." : \033[31m[non trouve]\033[0m\n";
		}
		$a++;
	}
	$i++;
}
echo "Lancement du script de correction dans 3 secondes ...\n";

echo "\033[35m-------------------------------------------ex00------------------------------------\033[0m\n";
echo "test 1 : \n";

$req = shell_exec("php -f day07/ex00/test.php");
$rep = "A Lannister is born !
My name is Tyrion
Short
Hear me roar!
";
$tab_req = explode("\n", $req);
$tab_rep = explode("\n", $rep);
$final = array_diff($tab_rep, $tab_req);
foreach ($tab_rep as $key => $value) {
	if (isset($final[$key])) {
		echo "\033[31m".$final[$key]."\033[0m | your return : ".$tab_req[$key]."\n";
	} else {
		echo "\033[32m".$value."\033[0m\n";
	}
}

echo "\033[35m-------------------------------------------ex01------------------------------------\033[0m\n";
echo "test 1 : \n";

$req = shell_exec("php -f day07/ex01/test1.php");
$rep = "We do not sow\n";
$tab_req = explode("\n", $req);
$tab_rep = explode("\n", $rep);
$final = array_diff($tab_rep, $tab_req);
foreach ($tab_rep as $key => $value) {
	if (isset($final[$key])) {
		echo "\033[31m".$final[$key]."\033[0m | your return : ".$tab_req[$key]."\n";
	} else {
		echo "\033[32m".$value."\033[0m\n";
	}
}

echo "test 2 : \n";

$req = shell_exec("php -f day07/ex01/test2.php");
if (preg_match("#Fatal error:#", $req)) {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[Tu dois retourner une 'fatal error']\033[0m\n";
}
echo "\033[35m-------------------------------------------ex02------------------------------------\033[0m\n";
echo "test 1 : \n";

$req = shell_exec("php -f day07/ex02/test.php");
$rep = "Viserys burns alive
Daenerys emerges naked but unharmed
";
$tab_req = explode("\n", $req);
$tab_rep = explode("\n", $rep);
$final = array_diff($tab_rep, $tab_req);
foreach ($tab_rep as $key => $value) {
	if (isset($final[$key])) {
		echo "\033[31m".$final[$key]."\033[0m | your return : ".$tab_req[$key]."\n";
	} else {
		echo "\033[32m".$value."\033[0m\n";
	}
}
echo "\033[35m-------------------------------------------ex03------------------------------------\033[0m\n";
echo "test 1 : \n";

$req = shell_exec("php -f day07/ex03/test1.php");
$rep = 'House Stark of Winterfell : "Winter is coming"
House Martell of Sunspear : "Unbowed, Unbent, Unbroken"
';
$tab_req = explode("\n", $req);
$tab_rep = explode("\n", $rep);
$final = array_diff($tab_rep, $tab_req);
foreach ($tab_rep as $key => $value) {
	if (isset($final[$key])) {
		echo "\033[31m".$final[$key]."\033[0m | your return : ".$tab_req[$key]."\n";
	} else {
		echo "\033[32m".$value."\033[0m\n";
	}
}

echo "test 2 : \n";

$req = shell_exec("php -f day07/ex03/test2.php");
if (preg_match("#Fatal error:#", $req)) {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[Tu dois retourner une 'fatal error']\033[0m\n";
}

echo "\033[35m-------------------------------------------ex04------------------------------------\033[0m\n";
echo "test 1 : \n";

$req = shell_exec("php -f day07/ex04/test.php");
$rep = "Not even if I'm drunk !
Let's do this.
With pleasure, but only in a tower in Winterfell, then.
Not even if I'm drunk !
Let's do this.
Not even if I'm drunk !
";
$tab_req = explode("\n", $req);
$tab_rep = explode("\n", $rep);
$final = array_diff($tab_rep, $tab_req);
foreach ($tab_rep as $key => $value) {
	if (isset($final[$key])) {
		echo "\033[31m".$final[$key]."\033[0m | your return : ".$tab_req[$key]."\n";
	} else {
		echo "\033[32m".$value."\033[0m\n";
	}
}

echo "\033[35m-------------------------------------------ex05------------------------------------\033[0m\n";
echo "test 1 : \n";

$req = shell_exec("php -f day07/ex05/test1.php");
$rep = "* looses his wolf on the enemy, and charges with courage *
* flees, finds a girl, grows a spine, and defends her to the bitter end *
";
$tab_req = explode("\n", $req);
$tab_rep = explode("\n", $rep);
$final = array_diff($tab_rep, $tab_req);
foreach ($tab_rep as $key => $value) {
	if (isset($final[$key])) {
		echo "\033[31m".$final[$key]."\033[0m | your return : ".$tab_req[$key]."\n";
	} else {
		echo "\033[32m".$value."\033[0m\n";
	}
}

echo "test 2 : \n";

$req = shell_exec("php -f day07/ex05/test2.php");
if (preg_match("#Fatal error:#", $req)) {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[Tu dois retourner une 'fatal error']\033[0m\n";
}

echo "\033[35m-------------------------------------------ex06------------------------------------\033[0m\n";
echo "test 1 : \n";

$req = shell_exec("php -f day07/ex06/test1.php");
$rep = "(Factory absorbed a fighter of type foot soldier)
(Factory already absorbed a fighter of type foot soldier)
(Factory absorbed a fighter of type archer)
(Factory absorbed a fighter of type assassin)
(Factory can't absorb this, it's not a fighter)
(Factory fabricates a fighter of type foot soldier)
(Factory hasn't absorbed any fighter of type llama)
(Factory fabricates a fighter of type foot soldier)
(Factory fabricates a fighter of type archer)
(Factory fabricates a fighter of type foot soldier)
(Factory fabricates a fighter of type assassin)
(Factory fabricates a fighter of type foot soldier)
(Factory fabricates a fighter of type archer)
* draws his sword and runs towards the Hound *
* draws his sword and runs towards Tyrion *
* draws his sword and runs towards Podrick *
* draws his sword and runs towards the Hound *
* draws his sword and runs towards Tyrion *
* draws his sword and runs towards Podrick *
* shoots arrows at the Hound *
* shoots arrows at Tyrion *
* shoots arrows at Podrick *
* draws his sword and runs towards the Hound *
* draws his sword and runs towards Tyrion *
* draws his sword and runs towards Podrick *
* creeps behind the Hound and stabs at it *
* creeps behind Tyrion and stabs at it *
* creeps behind Podrick and stabs at it *
* draws his sword and runs towards the Hound *
* draws his sword and runs towards Tyrion *
* draws his sword and runs towards Podrick *
* shoots arrows at the Hound *
* shoots arrows at Tyrion *
* shoots arrows at Podrick *
";
$tab_req = explode("\n", $req);
$tab_rep = explode("\n", $rep);
$final = array_diff($tab_rep, $tab_req);
foreach ($tab_rep as $key => $value) {
	if (isset($final[$key])) {
		echo "\033[31m".$final[$key]."\033[0m | your return : ".$tab_req[$key]."\n";
	} else {
		echo "\033[32m".$value."\033[0m\n";
	}
}

echo "test 2 : \n";

$req = shell_exec("php -f day07/ex06/test2.php");
if (preg_match("#Fatal error:#", $req)) {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[Tu dois retourner une 'fatal error']\033[0m\n";
}
?>