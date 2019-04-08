<?php

session_start();
extract($_POST);

define('UPLOAD_DIR', '../profil/');
$image_parts = explode(";base64,", $link);
$image_type_aux = explode("image/", $image_parts[0]);
$image_type = $image_type_aux[1];
$image_base64 = base64_decode($image_parts[1]);
$file = UPLOAD_DIR . $_SESSION['id'] . '.png';
$file1 = "profil/".$_SESSION['id'] . '.png';
$i = 0;
$data = file('../membres/membre.cvs');
file_put_contents('../membres/membre.cvs', "");
while (isset($data[$i])) {
    $e = explode(";", $data[$i]);
    if (isset($e[5]) && $e[0] == $_SESSION['id']) {
        $e[5] = $file1."\n";
        $data[$i] = implode(";", $e);
    }
    file_put_contents('../membres/membre.cvs', $data[$i], FILE_APPEND);
    $i++;
}
file_put_contents($file, $image_base64);

?>