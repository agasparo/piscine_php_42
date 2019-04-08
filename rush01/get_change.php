<?php

extract($_POST);
$octet = filesize($file); 
if ($octet != 0) { 
    $data = file($file);
    echo $data[0];
    file_put_contents($file, "");
} else {
    echo "rien";
}
?>