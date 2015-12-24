<?php
  $long = $_GET['long'];
  $lat = $_GET['lat'];

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

  $url = "https://api.forecast.io/forecast/".$key."/".$lat.",".$long;
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

?>
<html>
<head>
    <link href="main.css" media="screen" rel="stylesheet" type="text/css" />
  </head>
<body>
  <?php echo in_array_r("snow", $json) ? '<div id="yes"></div>' : '<div id="no"></div>'; ?>
  <div id="buttons">
    <a href="https://twitter.com/intent/tweet?button_hashtag=WillItSnowHere&text=I%20found%20out%20whether%20it'll%20snow%20here" class="twitter-hashtag-button" data-related="gembarrett" data-url="http://tinyurl.com/willitsnowhere">Tweet #WillItSnowHere</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
    <a aria-label="Star gembarrett/white-christmas on GitHub" href="https://github.com/gembarrett/white-christmas" class="github-button">Star</a>
    <script async defer id="github-bjs" src="https://buttons.github.io/buttons.js"></script>
    <p>Powered by <a href="http://forecast.io" target="_blank">Forecast.io</a></p>
  </div>
</body>
</html>