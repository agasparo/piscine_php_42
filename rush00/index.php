<?php
session_start();
?>
<html>
<head>
	<title>Mon minishop</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div id="bg_a">
	<div id="show_a">
	</div>
</div>
<div id="bg_ic">
	<div id="show_ic">
		<p id="close_form">&#9587;</p>
		<br><br>
		<h2>Se connecter</h2>
		<p id="faute_co"></p>
		<form>
			<input type="email" name="mail_connect" id="mail_connect" placeholder="Votre mail" class="form_in"><br><br>
			<input type="password" name="mdp_connect" id="mdp_connect" placeholder="Votre mot de passe" class="form_in"><br><br>
			<input type="submit" name="coco" id="coco" class="from_sub" value="Se connecter">
		</form>
		<br><br>
		<h2>S'inscrire</h2>
		<p id="faute_ins"></p>
		<form>
			<input type="text" name="pseudo_ins" id="pseudo_ins" placeholder="Votre pseudo" class="form_in"><br><br>
			<input type="email" name="mail_ins" id="mail_ins" placeholder="Votre mail" class="form_in"><br><br>
			<input type="password" name="mdp_ins" id="mdp_ins" placeholder="Votre mot de passe" class="form_in"><br><br>
			<input type="password" name="mdp_re_ins" id="mdp_re_ins" placeholder="Repeter votre mot de passe" class="form_in"><br><br>
			<input type="submit" name="ins" id="ins" class="from_sub" value="S'inscrire">
		</form>
	</div>
</div>
<div id="header">
	<h3 id="title">&#9822; Mon minishop.com</h3>
	<div id="left_deroule">
		&#9867;&#9867;
	</div>
</div>
<div id="menu-list">
<?php
include("php/cat.php");
?>
<?php
if (isset($_SESSION['id']) AND !empty($_SESSION['id'])) {
	?><a href="php/deconnection.php" class="co_menu">Se deconnecter</a>
	<hr class="hr_cat">
	<?php
	?><a href="php/suppr_compte.php" class="co_menu">Supprimer mon compte</a>
	<hr class="hr_cat">
	<a href="php/invoice.php" target="_blank" class="co_menu">Generer ma facture</a>
	<hr class="hr_cat">
	<?php
} else {
	if (!isset($_SESSION['in']) OR empty($_SESSION['in']))
		$_SESSION['in'] = uniqid();
	?><p id="co">Sinscrire / Se connecter</p>
	<hr class="hr_cat"><?php
}
?>
<p id="pan">Mon panier</p>
</div>
<div id="products">
<?php
include("php/product.php");
?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="js/show_prod.js"></script>
<script type="text/javascript" src="js/membre.js"></script>
<script type="text/javascript" src="js/panier.js"></script>
<script type="text/javascript" src="js/index.js"></script>
</body>
</html>