<?php
session_start();
if (isset($_SESSION['id']) AND !empty($_SESSION['id'])) {
	date_default_timezone_set("Europe/Paris");
	$data = file("../bdd/membre.cvs");
	$user = explode(";", $data[$_SESSION['id']]);
	
	$file = "../bdd/old_cust.cvs";
	if (!file_exists($file))
	{
		$fd = fopen($file, "w+");
		fclose($fd);
	}
	$old_cust = unserialize(file_get_contents($file));
	if (isset($old_cust[$_SESSION['id']]))
	{
		$name = $old_cust[$_SESSION['id']]['name'];
		$inc = $old_cust[$_SESSION['id']]['inc'];
		$mail = $old_cust[$_SESSION['id']]['mail'];
		$phone = $old_cust[$_SESSION['id']]['phone'];
		$nb = $old_cust[$_SESSION['id']]['id'];
	}
	else 
	{
		$mail = $user[2];		
		$phone = "0".rand(1,6).rand(11111111, 99999999);
		$name = $user[1];
		$nb = $user[0];
		$inc = [rand(1,25),rand(1,25),rand(1,25),rand(1,25)];
		$inc = chr(64 + $inc[0]).".".chr(64 + $inc[1]).".".chr(64 + $inc[2]).".".chr(64 + $inc[3]).".";
		$old_cust[$nb] = (["id" => $nb, "name" => $name, "inc" => $inc, "mail" => $user[2], "phone" => $phone]);
		file_put_contents($file, serialize($old_cust));
	}

	$date = date("d/m/Y");
	$prod = file("../bdd/commande_valide.cvs");
	$e = explode(";", $prod[$i]);
	$i = 0;

	?>
	<html>
	<head><meta http-equiv=Content-Type content="text/html; charset=UTF-8">
	<style type="text/css">
	span.cls_002  {
		font-family:Arial,serif;
		font-size:14.1px;
		color:rgb(0,0,0);
		font-weight:bold;
		font-style:normal;
		text-decoration: none;
	}

	div.cls_002 {
		font-family:Arial,serif;
		font-size:14.1px;
		color:rgb(0,0,0);
		font-weight:bold;
		font-style:normal;
		text-decoration: none;
	}

	span.cls_003 {
		font-family:Arial,serif;
		font-size:8.1px;
		color:rgb(0,0,0);
		font-weight:normal;
		font-style:normal;
		text-decoration: none;
	}

	div.cls_003 {
		font-family:Arial,serif;
		font-size:8.1px;
		color:rgb(0,0,0);
		font-weight:normal;
		font-style:normal;
		text-decoration: none;
	}

	span.cls_004 {
		font-family:Arial,serif;
		font-size:12.1px;
		color:rgb(0,0,0);
		font-weight:bold;
		font-style:normal;
		text-decoration: none;
	}

	div.cls_004 {
		font-family:Arial,serif;
		font-size:12.1px;
		color:rgb(0,0,0);
		font-weight:bold;
		font-style:normal;
		text-decoration: none;
	}

	span.cls_005 {
		font-family:Arial,serif;
		font-size:10.1px;
		color:rgb(0,0,0);
		font-weight:normal;
		font-style:normal;
		text-decoration: none;
	}

	div.cls_005 {
		font-family:Arial,serif;
		font-size:10.1px;
		color:rgb(0,0,0);
		font-weight:normal;
		font-style:normal;
		text-decoration: none;
	}

	#fact{
    position: absolute;
    left: 50%;
    margin-left: -297px;
    top: 0px;
    width: 595px;
    height: 841px;
    border-style: outset;
    overflow: hidden;
    background-image: url('../img/chess.jpg');
	}
	</style>

	
	</head>
	<body>
	<div id="fact">
		<div style="position:absolute;left:31.19px;top:24.75px" class="cls_002"><span class="cls_002">MiniShop</span></div>
		<div style="position:absolute;left:31.19px;top:43.12px" class="cls_003"><span class="cls_003">96 boulevard Bessières</span></div>
		<div style="position:absolute;left:399.69px;top:38.92px" class="cls_002"><span class="cls_002">Facture</span></div>
		<div style="position:absolute;left:31.19px;top:60px" class="cls_003"><span class="cls_003">75017, Paris, France</span></div>
		<div style="position:absolute;left:399.69px;top:57.29px" class="cls_003"><span class="cls_003">Date</span></div>
		<div style="position:absolute;left:470.56px;top:57.29px" class="cls_003"><span class="cls_003"><?php print(date("d/m/Y")) ?></span></div>
		<div style="position:absolute;left:31.19px;top:80px" class="cls_003"><span class="cls_003">Phone 0143909687</span></div>
		<div style="position:absolute;left:399.69px;top:75px" class="cls_003"><span class="cls_003">Invoice #</span></div>
		<div style="position:absolute;left:470.56px;top:75px" class="cls_003"><span class="cls_003"><?php print(rand(100000,900000)) ?></span></div>
		<div style="position:absolute;left:399.69px;top:95px" class="cls_003"><span class="cls_003">N client</span></div>
		<div style="position:absolute;left:470.56px;top:95px" class="cls_003"><span class="cls_003"><?php print($nb) ?></span></div>
		<div style="position:absolute;left:343.00px;top:128.16px" class="cls_003"><span class="cls_003"><b>Bill to</b></span></div>
		<div style="position:absolute;left:371.34px;top:145px" class="cls_003"><span class="cls_003"><?php print($name) ?></span></div>
		<div style="position:absolute;left:371.34px;top:160px" class="cls_003"><span class="cls_003"><?php print($inc." Inc.") ?></span></div>
		<div style="position:absolute;left:371.34px;top:177px" class="cls_003"><span class="cls_003"><?php print($mail) ?></span></div>
		<div style="position:absolute;left:371.34px;top:195px" class="cls_003"><span class="cls_003"><?php print($phone) ?></span></div>
		<div ><span class="cls_004"></span></div>
		<table style="position:absolute;left:31.19px;top:250px;width: 100%;" class="cls_004">
				<tr>
					<td><b>Description</b></td>
					<td><b>Quantité</b></td>
					<td><b>Prix</b></td>
				</tr>
			<?php
			$prix_total = 0;
			while (isset($prod[$i])) {
				$e = explode(";", $prod[$i]);
				$id = str_replace("\n", "", $e[5]);
				$a = 0;
				$c = 4;
				$obj = "";
				$pr = "";
				$id_u = "";
				while (isset($e[$a])) {
					if ($a % 6 == 0 AND !preg_match("#\n#", $e[$a])) {
						$id_u = trim($e[$a + 5]);
						$obj = $obj."<br>".$e[$a];
						$pr = $pr."<br>".$e[$a + 3]." x ".$e[$a + 2]." = ".($e[$a + 2] * $e[$a + 3])." €";
					}
					if (isset($e[$c]))
						$prix = "<br>".$e[$c];
					$a++;
					$c = $c + 6;
				}
				if (trim($id_u) == $_SESSION['id']) {
					$prix_total = $prix_total + str_replace('<br>', '', $prix); 
				?>
				<tr>
					<td><?= $obj; ?></td>
					<td><?= $pr; ?></td>
					<td><?= $prix." €"; ?></td>
				</tr>
				<?php
				}
				$i++;
			}?>
			<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
			</tr>
			<tr>
					<td>&nbsp;</td>
					<td>Subtotal</td>
					<td><?= $prix_total." €"; ?></td>
			</tr>
			<tr>
					<td>&nbsp;</td>
					<td>TVA (20%)</td>
					<td><?= $prix_total*0.2." €"; ?></td>
			</tr>
			<tr>
					<td>&nbsp;</td>
					<td>Total</td>
					<td><?= $prix_total*1.2." €"; ?></td>
			</tr>
		</table>
	</div>
	<button id="down">Click To Download Image</button>
	</body>
	<script src="https://html2canvas.hertzen.com/dist/html2canvas.js" type="text/javascript"></script>
	<script type="text/javascript">
	var usr = "<?= $name; ?>";
	document.getElementById('down').onclick = function() {
		downloadimage();
	}
	function downloadimage(){
	 	var container = document.getElementById("fact"); //specific element on page
		html2canvas(container,{allowTaint : true}).then(function(canvas) {
		
			var link = document.createElement("a");
			document.body.appendChild(link);
			link.download = usr+"_facture_commandes.jpg";
			link.href = canvas.toDataURL();
			link.target = '_blank';
			link.click();
			setTimeout(function() {
				document.body.removeChild(link);
			}, 3000)
		});
	}

</script>
	</html>
<?php
} else {
	header("Location:../index.php");
}
?>
