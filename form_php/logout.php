<?php
   session_name('adminSession');
   session_start();
   session_unset();
   // unset($_SESSION['fb_access_token']);
   if (isset($_COOKIE["donotlogout"])) {
   setcookie ("donotlogout","");
   }
   if(session_destroy()) {
      header("Location: login.php");
   }
?>
