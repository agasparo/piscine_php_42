<?php
session_start();
?>
<html>
<html>
<head>
	<title></title>
</head>
<?php
	if (isset($_GET['submit'])) {
		if (isset($_GET['login']) AND !empty($_GET['login']) AND isset($_GET['passwd']) AND !empty($_GET['passwd'])) {
			$_SESSION['mdp'] = $_GET['passwd'];
			$_SESSION['login'] = $_GET['login'];
		}
	}
?>
<body>
	<form method="GET" action="index.php">
		Identifiant: <input type="text" name="login" value="<?php if(isset($_SESSION['login']) AND !empty($_SESSION['login'])) {echo $_SESSION['login'];} ?>"><br />
		Mot de passe: <input type="password" name="passwd" value="<?php if(isset($_SESSION['mdp']) AND !empty($_SESSION['mdp'])) {echo $_SESSION['mdp'];} ?>">
		<input type="submit" name="submit" value="OK">
	</form>
</body>
</html>