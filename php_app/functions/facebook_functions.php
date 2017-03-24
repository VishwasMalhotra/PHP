<?php
   session_name('adminSession');
   session_start();
function facebook_login_check()
{
include("../database_connection.php");

  if (isset($_SESSION['facebookEmail'])) {

     $myusername = $conn->real_escape_string($_SESSION['facebookEmail']);

     $sql = "SELECT id FROM admin WHERE username = BINARY('$myusername')";
     $result = $conn->query($sql);
     $row = $result->fetch_array(MYSQLI_ASSOC);
     $count = $result->num_rows;

  if($count == 1) {
     if (isset($_GET['redirect'])) {
         header('Location: ' . $_GET['redirect']);
     } else {
         header('Location: ../admin/welcome.php');
     }
  } else {
    unset($_SESSION['fb_access_token']);
    session_destroy();
    header('Location: ../restricted_messages/noaccess.php');
  }
} else {
      unset($_SESSION['fb_access_token']);
      session_destroy();  
      header('Location: ../restricted_messages/givepermission.php');
}
}

function facebook_logout()
{
unset($_SESSION['fb_access_token']);
header('Location: home.php');
}
?>
