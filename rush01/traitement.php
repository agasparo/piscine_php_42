<?php

extract($_POST);
$evenement = "document.getElementById('".$id."').".$event."();";
file_put_contents($file, $evenement);

?>