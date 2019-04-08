<?php
date_default_timezone_set('Europe/Paris');
session_start();
?>
<head>
	<script type="text/javascript">top.frames['chat'].location = 'chat.php';</script>
</head>
<form method="post">
	<input type="text" name="msg" placeholder="Votre message">
	<input type="submit" name="submit" value="OK">
</form>
<?php

function compte() {
	$file = unserialize(file_get_contents('private/chat'));
	$i = 0;
	while (isset($file[$i])) {
		$i++;
	}
	return ($i);
}

if (isset($_SESSION['loggued_on_user']) AND !empty($_SESSION['loggued_on_user'])) {
	if(isset($_POST['submit'])) {
		if (isset($_POST['msg']) AND !empty($_POST['msg'])) {
			if (!file_exists("private"))
				mkdir("private");
			if (!file_exists('private/chat')) {
				$fd = fopen('private/chat', "w+");
				fclose($fd);
			}
			$msg['login'] = $_SESSION['loggued_on_user'];
			$msg['time'] = time();
			$msg['msg'] = $_POST['msg'];
			$u = unserialize(file_get_contents('private/chat'));
			$u[compte()] = $msg;
			$u = serialize($u);
			$fp = fopen("private/chat", "w+");
			if (flock($fp, LOCK_EX)) {
				file_put_contents('private/chat', $u, FILE_USE_INCLUDE_PATH);
				flock($fp, LOCK_UN);
			}
			fclose($fd);
		} else {
			echo "ERROR\n";
		}
	}
} else {
	echo "ERROR\n";
}
?>