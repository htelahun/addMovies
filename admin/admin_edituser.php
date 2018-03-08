<?php
//init_set('display_errors', 1);//mac
//error_reporting(E_All); //mac

require_once('phpscripts/config.php');
 //confirm_logged_in();

 //grab the id from the session
$id = $_SESSION['user_id'];
//echo $id;

//get single function on read.php file
$tbl = "tbl_user";
$col = "user_id";
$popform = getSingle($tbl, $col, $id);
//make info into array, echo in the HTML code
$found_user = mysqli_fetch_array($popform, MYSQLI_ASSOC);
//echo $found_user;

if(isset($_POST['submit'])){
  $fname = trim($_POST ['fname']);
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  $email = trim($_POST['email']);

  $result = editUser($id, $fname, $username, $password, $email);
  $message = $result;

}

 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CMS Portal</title>
  </head>
  <body>
    <h1>Welcome Company Name to your edit user page</h1>
<?php if(!empty($message)){echo $message;} ?>
    <form action="admin_edituser.php" method="post">
      <label>First name:</label>
    
      <input type="text" name="fname" value=" <?php echo $found_user['user_fname']; ?>"><br><br>

      <label>Username :</label>
      <input type="text" name="username" value=" <?php echo $found_user['user_name']; ?>"><br><br>

      <label>Password :</label>
      <input type="text" name="password" value=" <?php echo $found_user['user_pass']; ?>"><br><br>

      <label>Email :</label>
      <input type="text" name="email" value="<?php echo $found_user['user_email']; ?>"><br><br>

      <input type="submit" name="submit" value="Edit Account">

    </form>


  </body>
</html>
