<?php
//protecting the admin_index page, only shows info on page if logged in
session_start();

function confirm_logged_in(){

  if (!isset($_SESSION['user_id'])) {
    redirect_to("admin_login.php");
  }
}

function logged_out(){
  session_destroy();
  redirect_to("../admin_login.php");

}
 ?>
