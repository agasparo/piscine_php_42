<?php
extract($_POST);
file_put_contents("list.csv", $id.";".$name."\n", FILE_APPEND);
echo $id.";".$name;
?>