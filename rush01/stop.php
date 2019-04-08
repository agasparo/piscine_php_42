<?php

session_start();

$file = "queue.cvs";
$data = file($file);
$i = 0;
while (isset($data[$i])) {
    $int = str_replace("\n", "", $data[$i]);
    if ($int == $_SESSION['id']) {
        unset($data[$i]);
    }
    $i++;
}
$data = array_values($data);
$i = 0;
file_put_contents($file, "");
while (isset($data[$i])) {
    file_put_contents($file, $data[$i], FILE_APPEND);
    $i++;
}
?>