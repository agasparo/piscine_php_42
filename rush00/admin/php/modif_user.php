<?php
session_start();
extract($_POST);
if (isset($_SESSION['id']) AND !empty($_SESSION['id'])) {
	if (isset($groupe) AND !empty($groupe)) {
		$groupe = htmlspecialchars($groupe);
		$data = file("../../bdd/membre.cvs");
		$chaine = explode(";", $data[$id]);
		if (empty($chaine[4])) {
			$chaine[3] = str_replace("\n", "", $chaine[3]);
			$chaine[4] = $groupe."\n";
			$data[$id] = implode(";", $chaine);
		} else {
			$chaine[4] = $groupe."\n";
			$data[$id] = implode(";", $chaine);
		}
		$i = 0;
		file_put_contents("../../bdd/membre.cvs", "");
		while (isset($data[$i])) {
			file_put_contents("../../bdd/membre.cvs", $data[$i], FILE_APPEND);
			$i++;
		}
		echo "ok";
	}
}
?>