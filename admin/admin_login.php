<?php
//init_set('display_errors', 1);//mac
//error_reporting(E_All); //mac

require_once('phpscripts/config.php');

//what ip address youre signing in at
//test it localhost/MMED_3014_18/admin/admin_login.php
//php.net there are $_SERVER options
$ip = $_SERVER['REMOTE_ADDR'];
//echo $ip;

if (isset($_POST['submit'])) {
  //trim gets rid of whitespace
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);

  if ($username !=="" && $password !=="") {
  //  echo "you can type";
  $result = logIn($username, $password, $ip);
  $message = $result;
  }else{
    $message ="please fill in the required fields";
    //echo $message;
  }
}



 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CMS Portal Login</title>
  </head>
  <body>
    <h1>Welcome Company Name</h1>
    <?php
      if(!empty($message)){
        echo $message;
      }

     ?>
      <form action="admin_login.php" method="post">
        <label>Username</label>
        <input type="text" name="username" value="">
          <br>
        <label>Password </label>
        <input type="text" name="password" value="">
          <br>
        <input type="submit" name="submit" value="Show me the money">




      </form>
  </body>
</html>
