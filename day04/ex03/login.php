<?php
include('auth.php');
session_start();

if (isset($_GET['login']) AND !empty($_GET['login']) AND isset($_GET['passwd']) AND !empty($_GET['passwd'])) {
	if ((auth($_GET['login'], $_GET['passwd']) == true)) {
		$_SESSION['loggued_on_user'][0] = $_GET['login'];
		$_SESSION['loggued_on_user'][1] = $_GET['passwd'];
		echo "OK\n";
	} else {
		$_SESSION['loggued_on_user'] = "";
		echo "ERROR\n";
	}
}
?>