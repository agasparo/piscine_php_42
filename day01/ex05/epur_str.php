#!/usr/bin/php
<?php
$c = count($argv);
if ($c == 2) {
	$chaine = preg_replace("# +#", " ",$argv[1]);
	$chaine = trim($chaine);
	echo $chaine."\n";
}
