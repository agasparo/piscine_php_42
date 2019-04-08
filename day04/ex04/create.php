<?php

function user_exist($name) {

	if (file_exists('../private/passwd')) {
		$file = unserialize(file_get_contents('../private/passwd'));
		$i = 0;
		while (isset($file[$i])) {
			if ($file[$i]['login'] == $name)
				return (0);
			$i++;
		}
		return (1);
	} else {
		return (2);
	}
}

function compte() {
	$file = unserialize(file_get_contents('../private/passwd'));
	$i = 0;
	while (isset($file[$i])) {
		$i++;
	}
	return ($i);
}

if (isset($_POST['submit']) && $_POST['submit'] == "OK") {
	if (isset($_POST['login']) AND !empty($_POST['login']) AND isset($_POST['passwd']) AND !empty($_POST['passwd'])) {
			if (!file_exists("../private"))
				mkdir("../private");
			if (!file_exists('../private/passwd')) {
				$fd = fopen('../private/passwd', "w+");
				fclose($fd);
			}
			if (user_exist($_POST['login']) == 2) {
			$user['login'] = $_POST['login'];
			$user['passwd'] = hash('sha256', $_POST['passwd']);
			$compte[0] = $user;
			$compte = serialize($compte);
			file_put_contents('../private/passwd', $compte, FILE_USE_INCLUDE_PATH);
			echo "OK\n";
		} else if (user_exist($_POST['login']) == 1) {
			$user['login'] = $_POST['login'];
			$user['passwd'] = hash('sha256', $_POST['passwd']);
			$compte = unserialize(file_get_contents('../private/passwd'));
			$compte[compte()] = $user;
			$compte = serialize($compte);
			file_put_contents('../private/passwd', $compte, FILE_USE_INCLUDE_PATH);
			echo "OK\n";
		} else {
			echo "ERROR\n";
		}
	} else {
		echo "ERROR\n";
	}
}
?>