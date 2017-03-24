<?php
include("../database_connection.php");
include ("../functions/facebook_functions.php");
require '../facebook-sdk-v5/autoload.php';
session_name('adminSession');

echo $_SESSION['fb_access_token'];
echo $_SESSION['test'];

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
facebook_login_check();

?>