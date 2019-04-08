<?php
function manage_user() {
	?>
	<h1>Management des utilisateurs</h1>
	<p id="add_user" style="cursor: pointer;">Ajouter un utilisateur</p>
	<table>
		<tr>
			<td>id</td>
			<td>Pseudo</td>
			<td>Mail</td>
			<td>Groupe</td>
			<td>Fonction</td>
		</tr>
	<?php
	$data = file("../../bdd/membre.cvs");
	$i = 0;
	while (isset($data[$i])) {
		$e = explode(";", $data[$i]);
		if (count($e) > 1) {
			?>
			<tr>
				<td><?= $i ?></td>
				<td><?= $e[1]; ?></td>
				<td><?= $e[2]; ?></td>
				<td><input type="text" id="<?= $e[0].'9'; ?>" value="<?php if(empty($e[4])) { echo 'none'; } else {echo $e[4];} ?>"></td>
				<td>
					<p class="supprime_user" name="<?= $e[0]; ?>" title="Supprimer">&#9587;</p>
					<p class="Vald_user" name="<?= $e[0]; ?>" title="Valider">&#10004;</p>
					<p class="reload_user" name="<?= $e[0]; ?>" title="Recharger">&#10226;</p>
				</td>
			</tr>
			<?php
		}
		$i++;
	}
	?>
	</table>
	<?php
}
?>