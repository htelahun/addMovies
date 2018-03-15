<?php
//init_set('display_errors', 1);//mac
//error_reporting(E_All); //mac

require_once('phpscripts/config.php');
$result = multiReturns(6);
list($add, $multiply) = multiReturns(123);

 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CMS Portal Login</title>
  </head>
  <body>
    <?php

    echo "result 1 : {$result[0]} <br>";
    echo "result 2 : {$result[1]} <br>";

    echo "result 3 : {$add} <br>";
    echo "result 4 : {$multiply} <br>";





     ?>
  </body>
</html>
