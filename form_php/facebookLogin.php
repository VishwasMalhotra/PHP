<?php
include("studentInfoConfig.php");
require 'facebook-sdk-v5/autoload.php';
session_name('adminSession');
session_start();
$fb = new Facebook\Facebook([
  'app_id' => '1418910954831586',
  'app_secret' => 'b262ab99f96d8d2287aee9a6b89029d9',
  'default_graph_version' => 'v2.2',
  ]);

try {
  $response = $fb->get('/me?fields=id,name,email', $_SESSION['fb_access_token']);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
$user = $response->getGraphUser();
$_SESSION['facebookEmail'] = $user['email'];
$_SESSION['facebookName'] = $user['name'];
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
         header('Location: welcome.php');
     }
  } else {
    unset($_SESSION['fb_access_token']);
    session_destroy();
  	header('Location: noaccess.php');
  }
} else {
      unset($_SESSION['fb_access_token']);
      session_destroy();  
      header('Location: givepermission.php');
}
?>