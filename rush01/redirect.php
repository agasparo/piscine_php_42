<?php

session_start();

extract($_POST);

$infos = str_replace("\n", "", $infos);
$file = $infos.".php";
$txt = "txt/".$infos.".txt";
$test = explode(";", $infos);
$file2 = $test[1].";".$test[0].".php";
$name_file = "txt/".$test[0].";".$test[1].".arg.txt";
$name_rage = "txt/".$test[0].";".$test[1].".rage.txt";

if (!file_exists($file)) {
    $fd1 = fopen($txt, "w+");
    fclose($fd1);
    if (file_exists($file2)) {
        $_SESSION['order'] = 2;
    } else {
        $fd2 = fopen($name_file, "w+");
        fclose($fd2);
        $fd3 = fopen($name_rage, "w+");
        fclose($fd3);
        $_SESSION['order'] = 1;
    }
    $fd = fopen($file, "w+");
    fwrite($fd, '<?php include("main.php"); ?>
        <script type="text/javascript" src="js_in/getevent.js"></script>'
    );
    fclose($fd);
}
if (file_exists($file2) && file_exists($file)) {
    $data = file('queue.cvs');
    $i = 0;
    $de = explode(";", $infos);
    $id = $de[0];
    $id1 = $de[1];
    file_put_contents('queue.cvs', "");
    while (isset($data[$i])) {
        $e = str_replace("\n", "", $data[$i]);
        if ($e != $id1 && $e != $id)
            file_put_contents('queue.cvs', $data[$i], FILE_APPEND);
        $i++;
    }
}

echo $infos.".php";
?>