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

?>
<button style="
    background-color: transparent;
    border: 0;
    position: absolute;
    color: white;
    right: 7%;
    cursor: pointer;
" id="close">╳</button>
<h4 style="
    margin: 10px;
    text-align: center;
    color: white;
    font-family: fantasy;">Informations</h4><hr style="
    margin: 10px;
    margin-bottom: 18px;">
   <div style="width:100%">
<div style='width: 50%;float: left;'>
    <p>Nom :</p>
    <p>Vie :</p>
     <p>Taille :</p>
     <p>Puissance de moteurs :</p>
     <p>Vitesse :</p>
     <p>Manoeuvre :</p>
     <p>Bouclier :</p>
     <p>Arme(s) :</p>
     </div>
     <div style='width: 40%;float: left;text-align: right;padding-right: 20px;'>
<?php
?><p><?php echo $_SESSION["'".$name."'"]->show_name();?></p><?php
?><p><?php echo $_SESSION["'".$name."'"]->show_vie();?></p><?php
?><p><?php echo $_SESSION["'".$name."'"]->show_taille();?></p><?php
?><p><?php echo $_SESSION["'".$name."'"]->show_puis_moteur();?></p><?php
?><p><?php echo $_SESSION["'".$name."'"]->show_vitesse();?></p><?php
?><p><?php echo $_SESSION["'".$name."'"]->show_manoeuvre();?></p><?php
?><p><?php echo $_SESSION["'".$name."'"]->show_bouclier();?></p><?php
?><p><?php echo $_SESSION["'".$name."'"]->show_arme();?></p>
</div>