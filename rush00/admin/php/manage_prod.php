<?php
function manage_product() {
	?>
	<h1>Management des produits</h1>
	<p id="add_prod" style="cursor: pointer;">Ajouter un produits</p>
	<table>
		<tr>
			<td>id</td>
			<td>Nom</td>
			<td>lien de l'image</td>
			<td>Description</td>
			<td>Categorie</td>
			<td>stock</td>
			<td>prix</td>
			<td>Fonction</td>
		</tr>
	<?php
	$data = file("../../bdd/bdd.cvs");
	$i = 0;
	while (isset($data[$i])) {
		$e = explode(";", $data[$i]);
		?>
		<tr>
			<td><?= $i ?></td>
			<td><input type="text" id="<?= $e[0].'0'; ?>" value="<?= $e[1]; ?>"></td>
			<td><input type="text" id="<?= $e[0].'1'; ?>" value="<?= $e[2]; ?>"></td>
			<td><input type="text" id="<?= $e[0].'2'; ?>" value="<?= $e[3]; ?>"></td>
			<td><input type="text" id="<?= $e[0].'3'; ?>" value="<?= $e[4]; ?>"></td>
			<td><input type="text" id="<?= $e[0].'4'; ?>" value="<?= $e[5]; ?>"></td>
			<td><input type="text" id="<?= $e[0].'5'; ?>" value="<?= $e[6]; ?>"></td>
			<td>
				<p class="supprime" name="<?= $e[0]; ?>" title="Supprimer">&#9587;</p>
				<p class="Vald" name="<?= $e[0]; ?>" title="Valider">&#10004;</p>
				<p class="reload" name="<?= $e[0]; ?>" title="Recharger">&#10226;</p>
			</td>
		</tr>
		<?php
		$i++;
	}
	?>
	</table>
	<?php
}
?>