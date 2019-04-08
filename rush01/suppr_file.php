<?php

extract($_POST);

$joueur = explode(';', $file);
$ex = explode('.', $joueur[1]);
$joueur[1] = $ex[0];

$file1 = $joueur[1].";".$joueur[0];
$file2 = $joueur[0].";".$joueur[1];

if (file_exists($file1.'.php'))
    unlink($file1.'.php');
if (file_exists($file2.'.php'))
    unlink($file2.'.php');

if (file_exists("txt/".$file1.'.txt'))
    unlink("txt/".$file1.'.txt');
if (file_exists("txt/".$file2.'.txt'))
    unlink("txt/".$file2.'.txt');
    
if (file_exists("txt/".$file1.'.rage.txt'))
    unlink("txt/".$file1.'.rage.txt');
if (file_exists("txt/".$file2.'.rage.txt'))
    unlink("txt/".$file2.'.rage.txt');
    
if (file_exists("txt/".$file1.'.arg.txt'))
    unlink("txt/".$file1.'.arg.txt');
if (file_exists("txt/".$file2.'.arg.txt'))
    unlink("txt/".$file2.'.arg.txt');
?>