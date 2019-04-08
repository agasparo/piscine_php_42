<?php

class Construct_final_map {

	public $map;
	public $vai;

	public function __Construct($map, $tab) {
		$this->map = $map->map;
		$this->vai = $tab;
		$this->construct_map();
	}

	public function construct_map() {
		?>
		<table style="background-image: url('img/fond.png');" id="plateau">
			<?php
				$i = 0;
				$a = 0;
				while ($i < 100) {
					?>
					<tr>
						<?php
						$j = 0;
						while ($j < 150) {
							if ($this->map[$i][$j] == 1) {
								?>
								<td class="asteroid" id="<?= $i."x".$j; ?>"></td>
								<?php
							} else if ($this->map[$i][$j] == 2.1) {
								$nom = explode(",", $this->map[$i][$j]);
								?>
								<td class="vaisseau" name="<?= $nom[1].'1'; ?>" id="<?= $i."x".$j; ?>"></td>
								<?php
							} else if ($this->map[$i][$j] == 2.2) {
								$nom = explode(",", $this->map[$i][$j]);
								?>
								<td class="vaisseau" name="<?= $nom[1].'2'; ?>" id="<?= $i."x".$j; ?>"></td>
								<?php
							} else {
								?>
								<td class="vide" id="<?= $i."x".$j; ?>"></td>
								<?php
							}
							$j++;
						}
						?>
					</tr>
					<?php
					$i++;
				}
			?>
		</table>
		<?php
	}
}

?>