<?php
  $long = $_GET['long'];
  $lat = $_GET['lat'];
  $cDay = 1451001600;

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

  // test variables with alaska
  // $lat = "61.2180556";
  // $long = "-149.9002778";

  $url = "https://api.forecast.io/forecast/".$key."/".$lat.",".$long.",".$cDay;
  $contents = file_get_contents($url);
  $json = json_decode($contents, true);
  // var_dump($json);
  function in_array_r($needle, $haystack, $strict = true) {
      foreach ($haystack as $item) {
          if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
              return true;
          }
      }

      return false;
  }
  echo in_array_r("snow", $json) ? '<img src="GC-yes.jpg">' : '<img src="GC-no.jpg">';
?>