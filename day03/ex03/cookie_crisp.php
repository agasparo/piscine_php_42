<?php
if (isset($_GET['action']) AND !empty($_GET['action'])) {
	if ($_GET['action'] == 'get') {
		if (isset($_GET['name']) AND !empty($_GET['name'])) {
			if (isset($_COOKIE[$_GET['name']]))
				echo $_COOKIE[$_GET['name']]."\n";
		}
	} else if ($_GET['action'] == 'set') {
		if (isset($_GET['name']) AND !empty($_GET['name']) AND isset($_GET['value']) AND !empty($_GET['value'])) {
			setcookie($_GET['name'], $_GET['value'], time() + 3600, "/");
		}
	} else if ($_GET['action'] == 'del') {
		if (isset($_GET['name']) AND !empty($_GET['name'])) {
			setcookie($_GET['name']);
		}
	}
}
?>