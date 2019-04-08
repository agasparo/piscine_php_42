<?php
session_start();
?>
<p id="close_p">&#9587;</p>
<?php
if (isset($_SESSION['id']) AND !empty($_SESSION['id'])) {
	if (isset($_SESSION['in'])) {
		$data = file("../bdd/pann.cvs");
		$i = 0;
		while (isset($data[$i])) {
			$e = explode(";", $data[$i]);
			$e[1] = str_replace("\n", "", $e[1]);
			if ($e[1] == $_SESSION['in']) {
				$e[1] = $_SESSION['id']."\n";
				$data[$i] = implode(";", $e);
			}
			$i++;
		}
		file_put_contents("../bdd/pann.cvs", "");
		$i = 0;
		while (isset($data[$i])) {
			file_put_contents("../bdd/pann.cvs", $data[$i], FILE_APPEND);
			$i++;
		}
	}
	
	?><p style="cursor: pointer;" id="valider">Valider mon panier</p><?php
	$mon_id = $_SESSION['id'];
} else {
	$mon_id = $_SESSION['in'];
	?>
	<p style="cursor: pointer;">Connectez-vous pour valider votre panier</p><?php
}
?>
<div id="max_size">
	<table>
		<tr>
			<td>Article</td>
			<td>Description</td>
			<td>Image</td>
			<td>Prix unitaire</td>
			<td>Quantitee</td>
			<td>Supprimer</td>
		</tr>
		<?php
		$data = file("../bdd/pann.cvs");
		$find = file("../bdd/bdd.cvs");
		$i = 0;
		$total = 0;
		$is = array();
		$tab_is = 0;
		while (isset($data[$i])) {
			$req = explode(";", $data[$i]);
			$req[1] = str_replace("\n", "", $req[1]);
			if ($mon_id == $req[1]) {
				$a = 0;
				while (isset($find[$a])) {
					$nb = 0;
					$count = 0;
					while (isset($data[$nb])) {
						$e = explode(";", $data[$nb]);
						$e[1] = str_replace("\n", "", $e[1]);
						if ($e[1] == $mon_id AND $e[0] == $req[0])
							$count++;
						$nb++;
					}
					$articles = explode(";", $find[$a]);
					if ($articles[0] == $req[0] AND !in_array($req[0], $is)) {
						$is[$tab_is] = $req[0];
						$tab_is++;
						?>
						<tr>
							<td><?= $articles[1]; ?></td>
							<td><?= $articles[3]; ?></td>
							<td><img src="<?= $articles[2]; ?>" class="img_pin"></td>
							<td><?= $articles[6]." €"; ?></td>
							<td><?= $count; ?></td>
							<td class="suppr" id="<?= $articles[0]; ?>" name="<?= $req[1]; ?>">&#9587;</td>
						</tr>
						<?php
						$total = $total + ($articles[6] * $count);
						$articles[6] = str_replace("\n", "", $articles[6]);
						$tab[$tab_is] = $articles[1].";".$articles[3].";".$articles[6].";".$count.";".$total;
					}
					$a++;
				}
			}
			$i++;
		}
		$_SESSION['commande'] = $tab;
		?>
		<tr>
			<td>Total</td>
			<td></td>
			<td></td>
			<td><?= $total." €"; ?></td>
			<td></td>
			<td></td>
		</tr>
	</table>
</div>