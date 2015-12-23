
<?php

if ($handle = opendir('nope/')) {

    /* This is the correct way to loop over the directory. */
    while (false !== ($entry = readdir($handle))) {
      if ($entry != "." && $entry != "..") {
        $path = "nope/".$entry;
        echo $path;
      }
    }

    closedir($handle);
}

$key = file_get_contents($path);

?>
<html>
<head>
</head>
<body>
  <div id="demo"></div>
  <!-- <script type="text/javascript" src="logic.js"></script> -->
</body>
</html>