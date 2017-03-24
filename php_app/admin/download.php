<?php  
session_name('adminSession');
   session_start();
if(((!isset($_SESSION['facebookEmail']) && !isset($_SESSION['login_username']))) && !isset($_SESSION['cookie_var']))
{
  header("Location: login.php");
}
if (isset($_SESSION['cookie_var'])) {
if (!isset($_COOKIE["donotlogout"])) {
  header('Location: logout.php');
} 
}
include("database_connection.php");
header("Content-Type: application/octet-stream");
$user_id = $_GET['id'];
$sql = "SELECT userfile FROM users WHERE users.id = $user_id;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$file = $row['userfile'];
header("Content-Disposition: attachment; filename=\"".basename($file)."\"");
// header("Content-Disposition: attachment; filename=".basename($file)."");   
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Description: File Transfer");            
header("Content-Length: " . filesize($file));
flush(); 
$fp = fopen($file, "r");
while (!feof($fp))
{
    echo fread($fp, 65536);
    flush(); 
} 
fclose($fp); 
?>