<?php
ob_start('ob_gzhandler');

function user_exist($name, $old) {

	$file = unserialize(file_get_contents('../private/passwd'));
	$i = 0;
	while (isset($file[$i])) {
		if ($file[$i]['login'] == $name) {
			if (hash('sha256', $old) == $file[$i]['passwd']) {
				return ($i);
			}
		}
		$i++;
	}
	return (-1);
}

if (isset($_POST['submit'])) {
	if (isset($_POST['login']) AND !empty($_POST['login']) AND isset($_POST['oldpw']) AND !empty($_POST['oldpw']) AND isset($_POST['newpw']) AND !empty($_POST['newpw'])) {
		if (!file_exists("../private"))
			mkdir("../private");
		if (!file_exists('../private/passwd')) {
			$fd = fopen('../private/passwd', "w+");
			fclose($fd);
		}
		if ($i = user_exist($_POST['login'], $_POST['oldpw']) >= 0) {
			$user['login'] = $_POST['login'];
			$user['passwd'] = hash('sha256', $_POST['newpw']);
			$compte = unserialize(file_get_contents('../private/passwd'));
			$compte[$i] = $user;
			$compte = serialize($compte);
			file_put_contents('../private/passwd', $compte, FILE_USE_INCLUDE_PATH);
			echo "OK\n";
		} else {
			echo "ERROR\n";
		}
	} else {
		echo "ERROR\n";
	}
} else {
	echo "ERROR\n";
}
?>