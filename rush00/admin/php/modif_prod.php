<?php
session_start();
extract($_POST);
if (isset($_SESSION['id']) AND !empty($_SESSION['id'])) {
	if (isset($name) AND !empty($name) AND isset($link_img) AND !empty($link_img) AND isset($des) AND !empty($des) AND isset($cat) AND !empty($cat) AND isset($stock) AND !empty($stock) AND isset($prix) AND !empty($prix)) {
		$name = htmlspecialchars($name);
		$link_img = htmlspecialchars($link_img);
		$des = htmlspecialchars($des);
		$cat = htmlspecialchars($cat);
		$stock = htmlspecialchars($stock);
		$prix = htmlspecialchars($prix);
		if (is_numeric($prix) AND is_numeric($stock)) {
			$data = file("../../bdd/bdd.cvs");
			$chaine = $id.";".$name.";".$link_img.";".$des.";".$cat.";".$stock.";".$prix."\n";
			$data[$id] = $chaine;
			$i = 0;
			file_put_contents("../../bdd/bdd.cvs", "");
			while (isset($data[$i])) {
				file_put_contents("../../bdd/bdd.cvs", $data[$i], FILE_APPEND);
				$i++;
			}
			echo "ok";
		}
	}
}
?>