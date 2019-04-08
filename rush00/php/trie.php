<?php
extract($_POST);

$data = file("../bdd/bdd.cvs");
$i = 0;
$artcile_to_show = array();
$z = 0;
while (isset($data[$i])) {
	$elem = explode(";", $data[$i]);
	$cat = explode(", ", $elem[4]);
	$a = 0;
	while (isset($cat[$a])) {
		if ($cat[$a] == $name) {
			$artcile_to_show[$z] = $data[$i];
			$z++;
		}
		$a++;
	}
	$i++;
}
$i = 0;
while (isset($artcile_to_show[$i])) {
	$infos = explode(";", $artcile_to_show[$i]);
	?><div class="prod">
		<p class="titre"><strong><u><?= $infos[1]; ?></u></strong></p>
		<img src="<?= $infos[2]; ?>" class="img_prod">
		<p><?= $infos[3]; ?></p>
		<p><?= "categorie : ".$infos[4]; ?></p>
		<p><?= "prix : ".$infos[6]." €"; ?></p>
		<button id="<?= $infos[0]; ?>">Voir l'article</button>
	</div><?php
	$i++;
}
?>