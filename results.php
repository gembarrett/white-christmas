<?php
  $long = $_GET['long'];
  $lat = $_GET['lat'];
  $cEve = 1450915200;
  $cDay = 1451001600;
  $bDay = 1451088000;

  if ($handle = opendir('nope/')) {

      /* This is the correct way to loop over the directory. */
      while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
          $path = "nope/".$entry;
        }
      }

      closedir($handle);
  }

  $key = file_get_contents($path);
  $url = "https://api.forecast.io/forecast/".$key."/".$lat.",".$long.",".$cDay;
  $contents = file_get_contents($url);
  echo $contents;
?>