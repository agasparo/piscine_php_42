<?php 
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Espace membres"');
    header('HTTP/1.0 401 Unauthorized');
} else {
	if ($_SERVER['PHP_AUTH_USER'] == 'zaz' AND $_SERVER['PHP_AUTH_PW'] == 'jaimelespetitsponeys') {
		$data = file_get_contents("../img/42.png");
		$base64 = 'data:image/png;base64,' . base64_encode($data);
		echo "<html><body>\nBonjour Zaz<br />\n<img src='".$base64."'>\n</body></html>\n";
	} else {
		header('WWW-Authenticate: Basic realm="Espace membres"');
    	header('HTTP/1.0 401 Unauthorized');
		echo "<html><body>Cette zone est accessible uniquement aux membres du site</body></html>\n";
	}
}
?>