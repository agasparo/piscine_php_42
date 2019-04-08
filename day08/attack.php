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

$get_arme = str_replace(" ", "_", $_SESSION["'".$name."'"]->_arme);
$get = new $get_arme();
$portee = $get->get_round($get);
echo $portee;
echo ";";
echo $_SESSION["'".$name."'"]->show_taille();
?>