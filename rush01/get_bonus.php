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

echo $_SESSION["'".$name."'"]->show_vie().";";
$get_max = $_SESSION["'".$name."'"]->show_name();
$max_life = new $get_max();
echo $max_life->show_vie().";";
echo $_SESSION["'".$name."'"]->show_puis_moteur();

?>