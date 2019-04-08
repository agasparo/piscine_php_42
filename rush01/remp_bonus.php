<?php

extract($_POST);
require_once 'Vaissaux.class.php';
require_once 'vaisseaux/Fregate.class.php';
require_once 'vaisseaux/exploreur.class.php';
require_once 'vaisseaux/Destroyer.class.php';
require_once 'vaisseaux/Cuirasse.class.php';
require_once 'vaisseaux/Big_boom.class.php';

require_once 'Arme.class.php';
require_once 'armes/cannons.class.php';
require_once 'armes/El_vie.class.php';
require_once 'armes/lance_missiles.class.php';
require_once 'armes/minigun.class.php';
require_once 'armes/mitrailette.class.php';
session_start();

if ($ok == 1)
	$_SESSION["'".$name."'"]->add_vie($vie);
$_SESSION["'".$name."'"]->add_bouclier($bouclier);
$path = explode('/', $file);
$id = explode(';', end($path));
$ex = explode('.', $id[1]);
$name_file = "txt/".$id[0].";".$ex[0].".arg.txt";
$name_file1 = "txt/".$ex[0].";".$id[0].".arg.txt";

echo $name_file;

if (file_exists($name_file)) {
    echo "| 1 |";
    echo "$pos_plus.";".$tire_plus";
	file_put_contents($name_file, $pos_plus.";".$tire_plus);
} else {
    echo "| 2 |";
    echo "$pos_plus.";".$tire_plus";
	file_put_contents($name_file1, $pos_plus.";".$tire_plus);
}
?>