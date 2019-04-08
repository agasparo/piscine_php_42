<?php
session_start();
extract($_POST);
if (isset($mdp) AND !empty($mdp) AND isset($mail) AND !empty($mail)) {
	$mail = htmlspecialchars($mail);
	$mdp = sha1($mdp);
	if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
		$data = file("membre.cvs");
		$i = 0;
		$c = 0;
		$id = 0;
		while (isset($data[$i])) {
			$e = explode(";", $data[$i]);
			if (isset($e[2]) && $e[2] == $mail) {
				$md = explode("\n", $e[3]);
				if ($md[0] == $mdp) {
					$c++;
					$id = $e[0];
					$name_user = $e[1];
				}
			}
		$i++;
		}
		if ($c > 0) {
			$_SESSION['id'] = $id;
			$_SESSION['pseudo'] = $name_user;
			echo "reussi";
		} else {
			?><font color="red">Mauvais mail ou mauvais mot de passe</font><?php
		}
	} else {
		?><font color="red">Votre adresse mail n'est pas valide</font><?php
	}
} else {
	?><font color="red">Veuillez remplir tous les champs</font><?php
}
?>