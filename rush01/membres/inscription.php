<?php
extract($_POST);
if (isset($pseudo) AND !empty($pseudo) AND isset($mail) AND !empty($mail) AND isset($mdp1) AND !empty($mdp1) AND isset($mdp2) AND !empty($mdp2)) {
	$pseudo = htmlspecialchars($pseudo);
	$mail = htmlspecialchars($mail);
	$mdp1 = sha1($mdp1);
	$mdp2 = sha1($mdp2);
	if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
		if ($mdp2 == $mdp1) {
			$data = file("membre.cvs");
			$i = 0;
			$c = 0;
			while (isset($data[$i])) {
				$e = explode(";", $data[$i]);
				if (isset($e[2]) && $e[2] == $mail)
					$c++;
				$i++;
			}
			if ($c == 0) {
				$bdd = "membre.cvs";
				$i++;
				$infos = $i.";".$pseudo.";".$mail.";".$mdp1.";0;profil/logo_user.jpg\n";
				file_put_contents($bdd, $infos, FILE_APPEND);
				?><font color="green">Inscription reussi vous pouvez vous connecter</font><?php
			} else {
				?><font color="red">Votre adresse mail est deja utilisee</font><?php
			}
		} else {
			?><font color="red">Vos mot de passe ne concordent pas</font><?php
		}
	} else {
		?><font color="red">Votre adresse mail n'est pas valide</font><?php
	}
} else {
	?><font color="red">Veuillez remplir tous les champs</font><?php
}
?>