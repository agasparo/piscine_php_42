<?php
function show_comm() {
	$data = file("../../bdd/commande_valide.cvs");
	$i = 0;
	?>
	<h1>Liste des commandes</h1>
	<table>
		<tr>
			<td>id</td>
			<td>Acheteur</td>
			<td>Objets</td>
			<td>Prix</td>
			<td>Prix total de la commade</td>
		</tr>
	<?php
	while (isset($data[$i])) {
		$e = explode(";", $data[$i]);
		$id = str_replace("\n", "", $e[5]);
		$a = 0;
		$c = 4;
		$obj = "";
		$pr = "";
		while (isset($e[$a])) {
			if ($a % 6 == 0 AND !preg_match("#\n#", $e[$a])) {
				$obj = $obj."<br>".$e[$a + 3]." ".$e[$a];
				$pr = $pr."<br>".$e[$a + 3]." x ".$e[$a + 2]." = ".($e[$a + 2] * $e[$a + 3])." €";
			}
			if (isset($e[$c]))
				$prix = $e[$c];
			$a++;
			$c = $c + 6;
		}
		$dat = file("../../bdd/membre.cvs");
		$name = explode(";", $dat[$id]);
		?>
		<tr>
			<td><?= $i; ?></td>
			<td><?= $name[1]; ?></td>
			<td><?= $obj; ?></td>
			<td><?= $pr; ?></td>
			<td><?= $prix." €"; ?></td>
		</tr>
		<?php
		$i++;
	}
	?>
	</table>
	<?php
}