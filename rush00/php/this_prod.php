<?php
extract($_POST);

$bdd = "../bdd/bdd.cvs";
$data = file($bdd);
$infos = explode(";", $data[$id]);
?>
<p id="close">&#9587;</p>
<p><strong><u><?= $infos[1]; ?></u></strong></p>
<img src="<?= $infos[2]; ?>" class="img_sh">
<p><?= $infos[3]; ?></p>
<p><?= "categorie : ".$infos[4]; ?></p>
<?php $s = explode("\n", $infos[5]); ?>
<p><?= "stock : ".$s[0]; ?></p>
<p><?= "prix : ".$infos[6]." €"; ?></p>
<?php
if ($s[0] > 0) {
	?><p id="buy" name="<?= $id; ?>">&#10230; ajouter au panier &#10229;</p><?php
} else {
	?><p>article en rupture de stock</p><?php
}
?>