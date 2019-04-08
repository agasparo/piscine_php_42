<?php

function ft_split($chaine) {
	$chaine = preg_replace("# +#", " ",$chaine);
	$tab = explode(' ', $chaine);
	sort($tab);
	return($tab);
}
