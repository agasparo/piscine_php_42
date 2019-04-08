<?php

echo "\033[35m----------------------------------------nom_fichier------------------------------------\033[0m\n";

$i = 0;
$tab[0] = 'hw.php';
$tab[1] = 'mlx.php';
$tab[2] = 'oddeven.php';
$tab[3] = 'ft_split.php';
$tab[4] = 'aff_param.php';
$tab[5] = 'epur_str.php';
$tab[6] = 'ssap.php';
$tab[7] = 'rostring.php';
$tab[8] = 'ft_is_sort.php';
$tab[9] = 'ssap2.php';
$tab[10] = 'do_op.php';
$tab[11] = 'do_op_2.php';
$tab[12] = 'search_it!.php';
$tab[13] = 'sing_it!.php';
$tab[14] = 'agent_stats.php';


while ($i < 15) {
	if ($i < 10)
		$commade = "day01/ex0".$i."/".$tab[$i];
	else
		$commade = "day01/ex".$i."/".$tab[$i];
	if (file_exists($commade)) {
		echo "Fichier ".$tab[$i]." : \033[32m[OK]\033[0m\n";
	} else {
		echo "Fichier ".$tab[$i]." : \033[31m[non trouve]\033[0m\n";
	}
	$i++;
}

echo "Lancement du script de correction dans 3 secondes ...\n";
sleep(3);
echo "Lancement du script\n";
sleep(0.5);
echo "\033[35m-------------------------------------------ex00------------------------------------\033[0m\n";
echo "test 1 : ";
$req = shell_exec('./day01/ex00/hw.php');
if ($req == "Hello World\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "\033[35m-------------------------------------------ex01------------------------------------\033[0m\n";
echo "test 1 : ";
$req = shell_exec('./day01/ex01/mlx.php');
if (strlen($req) == 1001) {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "\033[35m-------------------------------------------ex03------------------------------------\033[0m\n";
include('day01/ex03/ft_split.php');

function ft_splits($chaine) {
	$chaine = preg_replace("# +#", " ",$chaine);
	$tab = explode(' ', $chaine);
	sort($tab);
	return($tab);
}
echo "test 1 : ";
if (count(array_diff(ft_split("0 00 0"), ft_splits("0 00 0"))) == 0) {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "\033[35m-------------------------------------------ex04------------------------------------\033[0m\n";
$req = shell_exec('./day01/ex04/aff_param.php toto ahah foo bar quax');
echo "test 1 : ";
if ($req == "toto\nahah\nfoo\nbar\nquax\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}
echo "test 2 : ";
$req = shell_exec('./day01/ex04/aff_param.php toto ahah foo bar quax "bnceuivbe bubu" ');
if ($req == "toto\nahah\nfoo\nbar\nquax\nbnceuivbe bubu\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "\033[35m-------------------------------------------ex05------------------------------------\033[0m\n";
$req = shell_exec('./day01/ex05/epur_str.php " Hello World "');
echo "test 1 : ";
if ($req == "Hello World\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}
echo "test 2 : ";
$req = shell_exec('./day01/ex05/epur_str.php  "Salut,    comment         ca         va            ?             " ');
if ($req == "Salut, comment ca va ?\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 3 : ";
$req = shell_exec('./day01/ex05/epur_str.php');
if ($req == "") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "\033[35m-------------------------------------------ex06------------------------------------\033[0m\n";
$req = shell_exec('./day01/ex06/ssap.php foo bar');
echo "test 1 : ";
if ($req == "bar\nfoo\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}
echo "test 2 : ";
$req = shell_exec('./day01/ex06/ssap.php foo bar "yo man" "A moi compte, deux mots" Xibul');
if ($req == "A\nXibul\nbar\ncompte,\ndeux\nfoo\nman\nmoi\nmots\nyo\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 3 : ";
$req = shell_exec('./day01/ex06/ssap.php');
if ($req == "") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "\033[35m-------------------------------------------ex07------------------------------------\033[0m\n";
$req = shell_exec('./day01/ex07/rostring.php sdfkjsdkl sdkjfskljdf');
echo "test 1 : ";
if ($req == "sdfkjsdkl\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}
echo "test 2 : ";
$req = shell_exec('./day01/ex07/rostring.php  "hello world aaa" fslkdjf');
if ($req == "world aaa hello\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 3 : ";
$req = shell_exec('./day01/ex07/rostring.php');
if ($req == "") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "\033[35m-------------------------------------------ex08------------------------------------\033[0m\n";
echo "test 1 : ";
include("day01/ex08/ft_is_sort.php");
$tab = array("!/@#;^", "42", "Hello World", "salut", "zZzZzZz");
$tab[] = "Et qu’est-ce qu’on fait maintenant ?";
if (ft_is_sort($tab))
	echo "\033[31m[FAUX]\033[0m\n";
else
	echo "\033[32m[OK]\033[0m\n";
echo "test 2 : ";
$tab = array("!/@#;^", "42", "Hello World", "salut", "zZzZzZz");
if (ft_is_sort($tab))
	echo "\033[32m[OK]\033[0m\n";
else
	echo "\033[31m[FAUX]\033[0m\n";

echo "test 3 : ";
$tab = array("{", "m", "<", ";", "99");
if (ft_is_sort($tab))
	echo "\033[32m[OK]\033[0m\n";
else
	echo "\033[31m[FAUX]\033[0m\n";

echo "test 4 : ";
$tab = array("{", "{", "{", "{", "{");
if (ft_is_sort($tab))
	echo "\033[32m[OK]\033[0m\n";
else
	echo "\033[31m[FAUX]\033[0m\n";

echo "\033[35m-------------------------------------------ex09------------------------------------\033[0m\n";
$req = shell_exec('./day01/ex09/ssap2.php toto tutu 4234 "_hop XXX" \## "1948372 AhAhAh"');
echo "test 1 : ";
if ($req == "AhAhAh\ntoto\ntutu\nXXX\n1948372\n4234\n##\n_hop\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}
echo "test 2 : ";
$req = shell_exec('./day01/ex09/ssap2.php A45 toto tutu 4234 "_hop XXX" \## "1948372 AhAhAh" ');
if ($req == "AhAhAh\nA45\ntoto\ntutu\nXXX\n1948372\n4234\n##\n_hop\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 3 :";
$req = shell_exec('./day01/ex09/ssap2.php toto tutu 4234 "_hop XXX" "##" "1948372 1 42 8 26   AhAhAh      " A45 abcd abc ');
$rep = "abc
abcd
AhAhAh
A45
toto
tutu
XXX
1
1948372
26
42
4234
8
##
_hop
";
if ($req == $rep) {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "\033[35m-------------------------------------------ex10------------------------------------\033[0m\n";
echo "test 1 : ";
$req = shell_exec('./day01/ex10/do_op.php');
if ($req == "Incorrect Parameters\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 2 : ";
$req = shell_exec('./day01/ex10/do_op.php 1 + 3');
if ($req == "4\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 3 : ";
$req = shell_exec('./day01/ex10/do_op.php " 1" " +" " 3"');
if ($req == "4\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 4 : ";
$req = shell_exec('./day01/ex10/do_op.php " 1" " *" " 3"');
if ($req == "3\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 5 : ";
$req = shell_exec('./day01/ex10/do_op.php 42 "% " 3');
if ($req == "0\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 6 : ";
$req = shell_exec('./day01/ex10/do_op.php 42 "% " p');
if ($req == "") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 7 : ";
$req = shell_exec('./day01/ex10/do_op.php p "% " 45');
if ($req == "") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 8 : ";
$req = shell_exec('./day01/ex10/do_op.php 15 "o " 45');
if ($req == "") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 9 : ";
$req = shell_exec('./day01/ex10/do_op.php 15 / 0');
if ($req == "") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 10 : ";
$req = shell_exec('./day01/ex10/do_op.php 15 % 0');
if ($req == "") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 11 : ";
$req = shell_exec('./day01/ex10/do_op.php 15 - -2');
if ($req == "17\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 12 : ";
$req = shell_exec('./day01/ex10/do_op.php 15 - " -2"');
if ($req == "17\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "\033[35m-------------------------------------------ex11------------------------------------\033[0m\n";
echo "test 1 : ";
$req = shell_exec('./day01/ex11/do_op_2.php');
if ($req == "Incorrect Parameters\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 2 : ";
$req = shell_exec('./day01/ex11/do_op_2.php toto');
if ($req == "Syntax Error\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 3 : ";
$req = shell_exec('./day01/ex11/do_op_2.php "42*2"');
if ($req == "84\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 4 : ";
$req = shell_exec('./day01/ex11/do_op_2.php " 42 / 2 "');
if ($req == "21\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 5 : ";
$req = shell_exec('./day01/ex11/do_op_2.php "six6*7sept"');
if ($req == "Syntax Error\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 6 : ";
$req = shell_exec('./day01/ex11/do_op_2.php 42 "% " p');
if ($req == "Incorrect Parameters\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 9 : ";
$req = shell_exec('./day01/ex11/do_op_2.php "15 / 0"');
if ($req == "") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 10 : ";
$req = shell_exec('./day01/ex11/do_op_2.php "15 % 0"');
if ($req == "") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 11 : ";
$req = shell_exec('./day01/ex11/do_op_2.php "15 + -4"');
if ($req == "11\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 12 : ";
$req = shell_exec('./day01/ex11/do_op_2.php "15 * -4"');
if ($req == "-60\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 13 : ";
$req = shell_exec('./day01/ex11/do_op_2.php "15 / -4"');
if ($req == "-3.75\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 14 : ";
$req = shell_exec('./day01/ex11/do_op_2.php "15 % -4"');
if ($req == "3\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}


echo "test 15 : ";
$req = shell_exec('./day01/ex11/do_op_2.php "-2516-456"');
if ($req == "-2972\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 16 : ";
$req = shell_exec('./day01/ex11/do_op_2.php "-2516- -456"');
if ($req == "-2060\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 17 : ";
$req = shell_exec('./day01/ex11/do_op_2.php "-2516--456"');
if ($req == "-2060\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 18 : ";
$req = shell_exec('./day01/ex11/do_op_2.php "2516--456"');
if ($req == "2972\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "\033[35m-------------------------------------------ex12------------------------------------\033[0m\n";
$req = shell_exec('./day01/ex12/search_it!.php toto');
echo "test 1 : ";
if ($req == "") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}
echo "test 2 : ";
$req = shell_exec('./day01/ex12/search_it!.php toto "key1:val1" "key2:val2" "toto:42" ');
if ($req == "42\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 3 : ";
$req = shell_exec('./day01/ex12/search_it!.php "0" "key1:val1" "key2:val2" "0:hop" ');
if ($req == "hop\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 4 : ";
$req = shell_exec('./day01/ex12/search_it!.php toto "toto:val1" "key2:val2" "toto:42"');
if ($req == "42\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 5 : ";
$req = shell_exec('./day01/ex12/search_it!.php  "toto" "key1:val1" "key2:val2" "0:hop"');
if ($req == "") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "\033[35m-------------------------------------------ex13------------------------------------\033[0m\n";
echo "test 1 : ";
$req = shell_exec('./day01/ex13/sing_it!.php  "mais pourquoi cette demo ?"');
if ($req == "Tout simplement pour qu'en feuilletant le sujet\non ne s'apercoive pas de la nature de l'exo..\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 2 : ";
$req = shell_exec('./day01/ex13/sing_it!.php');
if ($req == "") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "\033[35m-------------------------------------------ex14------------------------------------\033[0m\n";
echo "test 1 : ";
$req = shell_exec('cat rss/day01/peer_notes_1.csv | ./day01/ex14/agent_stats.php');
if ($req == "") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 2 : ";
$req = shell_exec('cat rss/day01/peer_notes_1.csv| ./day01/ex14/agent_stats.php moyenne');
if ($req == "9.8621262458472\n") {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}
echo "test 3 : ";
$req = shell_exec('cat rss/day01/peer_notes_1.csv | ./day01/ex14/agent_stats.php moyenne_user');
$rep = "adam_e:9.0555555555556
bertrand_y:7.9473684210526
bruce_w:9.0434782608696
clark_k:10.464285714286
david_a:8.68
dexter_m:8.9
didier_f:11.3125
francois_h:12.684210526316
georges_b:9.65
hans_z:12.4375
howard_s:8.6842105263158
jean_t:7.8333333333333
john_w:11.294117647059
joseph_c:8.9375
laurent_g:11.882352941176
leo_g:10.25
lois_l:12.789473684211
ludovic_k:7.2631578947368
maelle_m:7.6842105263158
marcel_j:10.818181818182
marie_c:9.3333333333333
mathieu_c:10.086956521739
melissa_v:10.526315789474
michel_r:14
nicolas_s:7.3181818181818
olivier_z:12.625
roxane_e:7.3913043478261
sandra_n:11.181818181818
steve_j:11.5
trevor_r:6.1052631578947
";
if ($req == $rep) {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

echo "test 4 : ";
$req = shell_exec('cat rss/day01/peer_notes_1.csv | ./day01/ex14/agent_stats.php ecart_moulinette');
$rep = "adam_e:3.0555555555556
bertrand_y:-1.0526315789474
bruce_w:-9.9565217391304
clark_k:0.46428571428571
david_a:-7.32
dexter_m:1.9
didier_f:-0.6875
francois_h:-0.31578947368421
georges_b:-9.35
hans_z:9.4375
howard_s:-0.31578947368421
jean_t:-2.1666666666667
john_w:-1.7058823529412
joseph_c:-3.0625
laurent_g:-4.1176470588235
leo_g:4.25
lois_l:6.7894736842105
ludovic_k:-7.7368421052632
maelle_m:-10.315789473684
marcel_j:3.8181818181818
marie_c:-4.6666666666667
mathieu_c:-5.9130434782609
melissa_v:7.5263157894737
michel_r:9
nicolas_s:-10.681818181818
olivier_z:3.625
roxane_e:-9.6086956521739
sandra_n:2.1818181818182
steve_j:10.5
trevor_r:-12.894736842105
";
if ($req == $rep) {
	echo "\033[32m[OK]\033[0m\n";
} else {
	echo "\033[31m[FAUX]\033[0m\n";
}

?>