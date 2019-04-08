<?php
$data = file("bdd/bdd.cvs");
$i = 0;
$z = 0;
$cat = array();
while (isset($data[$i])) {
	$e = explode(";", $data[$i]);
	$cate = explode(", ", $e[4]);
	$a = 0;
	while (isset($cate[$a])) {
		if ($cate[$a] != "undefined" AND !in_array($cate[$a], $cat)) {
			$cat[$z] = $cate[$a];
			$z++;
		}
		$a++;
	}
	$i++;
}
$cat = array_values($cat);
$i = 0;
while (isset($cat[$i])) {
	echo "<p class='cat_menu'>".$cat[$i]."</p><hr class='hr_cat'>";
	$i++;
}
echo "<p class='cat_menu'>Tous</p><hr class='hr_cat'>";
?>