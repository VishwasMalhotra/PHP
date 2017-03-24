<?php
include ("../functions/facebook_functions.php");
require 'facebook-sdk-v5/autoload.php';
session_name('adminSession');

$fb = new Facebook\Facebook([
  'app_id' => '1418910954831586',
  'app_secret' => 'b262ab99f96d8d2287aee9a6b89029d9',
  'default_graph_version' => 'v2.2',
  ]);

facebook_logout();
?>
