#!/usr/bin/php
<?php
	date_default_timezone_set('Europe/Paris');
    $file = fopen("/var/run/utmpx", "r");
    while ($utmpx = fread($file, 628)){
        $unpack = unpack("a256a/a4b/a32c/id/ie/I2f/a256g/i16h", $utmpx);
        $array[$unpack['c']] = $unpack;
    }
    foreach ($array as $valeur){
        if ($valeur['e'] == 7) {
            echo str_pad(substr(trim($valeur['a']), 0, 8), 8, " ")." ";
            echo str_pad(substr(trim($valeur['c']), 0, 8), 8, " ")." ";
            echo date("M", $valeur["f1"]);
            echo str_pad(date("j", $valeur["f1"]), 3, " ", STR_PAD_LEFT)." ".date("H:i", $valeur["f1"])." \n";
        }
    }
?>