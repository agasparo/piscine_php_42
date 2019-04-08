#!/usr/bin/php
<?php
date_default_timezone_set("Europe/Paris");

function validateDate($date, $format = 'Y-m-d-l H:i:s')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}

if (count($argv) == 2) {
   $day["lundi"] = 'Monday'; $day["mardi"] = 'Tuesday'; $day["mercredi"] = 'Wednesday'; $day["jeudi"] = 'Thursday'; $day["vendredi"] = 'Friday'; $day["samedi"] = 'Saturday'; $day["dimanche"] = 'Sunday';
   $month["janvier"] = '01'; $month["fevrier"] = '02'; $month["mars"] = '03'; $month["avril"] = '04'; $month["mai"] = '05'; $month["juin"] = '06';
   $month["juillet"] = '07'; $month["aout"] = '08'; $month["septembre"] = '09'; $month["octobre"] = '10'; $month["novembre"] = '11'; $month["decembre"] = '12';
   $infos = explode(' ', $argv[1]);
   $infos[0][0] = strtolower(str_replace(utf8_decode('é'), 'e', $infos[0][0]));
   $infos[2] = str_replace('é', 'e', $infos[2]);
   $infos[2] = str_replace('û', 'u', $infos[2]);
   $infos[2][0] = strtolower($infos[2][0]);
   if (count($infos) == 5 AND isset($day[$infos[0]]) AND isset($month[$infos[2]])) {
      if ($infos[1] < 10)
          $infos[1] = "0".$infos[1];
      if (validateDate($infos[3].'-'.$month[$infos[2]].'-'.$infos[1].'-'.$day[$infos[0]].' '.$infos[4])) {
      	 $h = explode(":", $infos[4]);
         echo mktime($h[0], $h[1], $h[2], $month[$infos[2]], $infos[1], $infos[3])."\n";
      } else {
      	echo "Wrong Format\n";
      }
   } else {
     echo "Wrong Format\n";
   }
}
?>