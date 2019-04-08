<?php

function auth($login, $passwd) {
	$file = unserialize(file_get_contents('../private/passwd'));
	$i = 0;
	while (isset($file[$i])) {
		if ($file[$i]['login'] == $login) {
			if (hash('sha256', $passwd) == $file[$i]['passwd']) {
				return (true);
			}
		}
		$i++;
	}
	return (false);
}
?>