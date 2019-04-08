<?php

session_start();

?>
<title>BATTLESTARS</title>
<?php

require_once 'map/Map.class.php';
require_once 'map/Place.class.php';
require_once 'map/Construct_final_map.class.php';

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

?>
<link rel="stylesheet" type="text/css" href="css/style.css">
<div id="charge">
	<h1 class="h1_load">BATTLESTARS</h1>
	<img src="img/load.gif" class="img_load">
</div>
<?php
$map = new Map();
$vai = array(0 => 'Fregate', 1 => 'Destroyer', 2 => 'Cuirasse', 3 => 'exploreur', 4 => 'Big_boom');
$all = array(0 => 'Fregate1', 1 => 'Destroyer1', 2 => 'Cuirasse1', 3 => 'exploreur1', 4 => 'Big_boom1', 5 => 'Fregate2', 6 => 'Destroyer2', 7 => 'Cuirasse2', 8 => 'exploreur2', 9 => 'Big_boom2');
$i = 0;
while ($i < 5) {
	${$vai[$i]."1"} = new $vai[$i]();
	if ($i == 0)
		$place = new Place($map, ${$vai[$i]."1"}, 1);
	else 
		$place = new Place($place, ${$vai[$i]."1"}, 1);
	${$vai[$i]."1"}->_coord = array(0 => Place::$place_x, 1 => Place::$place_y);
	$_SESSION["'".$vai[$i]."1'"] = ${$vai[$i]."1"};
	$i++;
}

$i = 0;
Place::$place_x = 85;
Place::$place_y = 20;
while ($i < 5) {
	${$vai[$i]."2"} = new $vai[$i]();
	$place = new Place($place, ${$vai[$i]."2"}, 2);
	${$vai[$i]."2"}->_coord = array(0 => Place::$place_x, 1 => Place::$place_y);
	$_SESSION["'".$vai[$i]."2'"] = ${$vai[$i]."2"};
	$i++;
}
$final_map = new Construct_final_map($place, $all);
?>
<div id="dammage"></div>
<div id="cine">
<img src="" id="img_cine" class="images_cine">
<h3 id="text"></h3>
</div>
<div id="carac"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="js/des.js"></script>
<script type="text/javascript" src="js/dep.js"></script>
<script type="text/javascript" src="js/kill.js"></script>
<script type="text/javascript" src="js/cinematique.js"></script>
<script type="text/javascript" src="js/index.js"></script>