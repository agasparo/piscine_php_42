<?php
session_start();

$bdd = "bdd/bdd.cvs";
$data = file($bdd);
$i = 0;
while (isset($data[$i])) {
	$infos = explode(";", $data[$i]);
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