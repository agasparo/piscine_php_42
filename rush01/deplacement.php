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

$taille = explode("x", $_SESSION["'".$name."'"]->show_taille());
$x = $taille[0];
$y = $taille[1];
echo $_SESSION["'".$name."'"]->show_vitesse();
echo ";";
echo $_SESSION["'".$name."'"]->show_taille();
?>