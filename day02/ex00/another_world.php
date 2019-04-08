#!/usr/bin/php
<?php
if (count($argv) > 1)
   echo $chaine = preg_replace("# +#", " ", trim(str_replace("\t", " ", $argv[1])))."\n";
?>