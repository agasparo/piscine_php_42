<?php
session_start();
if (isset($_SESSION['id']) AND !empty($_SESSION['id'])) {
	extract($_POST);
	$data = file("../../bdd/membre.cvs");
	$id = count($data);
	if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
		$res = file("../../bdd/membre.cvs");
		$i = 0;
		$c = 0;
		while (isset($res[$i])) {
			$e = explode(";", $res[$i]);
			if ($e[2] == $mail)
				$c++;
			$i++;
		}
		if ($c == 0) {
			$chaine = $id.";".$name.";".$mail;
			$data[$id] = $chaine.";".sha1('1234').";\n";
			$i = 0;
			file_put_contents("../../bdd/membre.cvs", "");
			while (isset($data[$i])) {
				file_put_contents("../../bdd/membre.cvs", $data[$i], FILE_APPEND);
				$i++;
			}
			echo "ok";
		}
	}
}
?>