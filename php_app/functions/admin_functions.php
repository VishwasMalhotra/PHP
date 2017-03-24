<?php
   session_name('adminSession');
   session_start();

function login_via_facebook()
{
    if (!isset($_SESSION['fb_access_token'])) {
        $fb = new Facebook\Facebook ([
        'app_id' => '1418910954831586',
        'app_secret' => 'b262ab99f96d8d2287aee9a6b89029d9',
        'default_graph_version' => 'v2.5',
        ]);

        $helper = $fb->getRedirectLoginHelper();
        $permissions = ['email']; 
        $loginUrl = $helper->getLoginUrl('http://52.40.58.82/facebookSession/fb-callback.php', $permissions);
        echo '<a class="btn btn-info" href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
    }
}

function admin_login()
{
   include("../database_connection.php");

      $_SESSION['login_username'] = $_POST['username'];
         $myusername = $conn->real_escape_string($_POST['username']);
         $mypassword = md5($conn->real_escape_string($_POST['password']));
      
         $sql = "SELECT id FROM admin WHERE username = BINARY('$myusername') and password = BINARY('$mypassword')";
         $result = $conn->query($sql);
         $row = $result->fetch_array(MYSQLI_ASSOC);
         $count = $result->num_rows;

      if($count == 1) {
      if(!empty($_POST["remember"])) {
        $_SESSION['cookie_var'] = 'cookie';
        setcookie('donotlogout',$_POST["username"],time()+(3600));
        header('Location: welcome.php');
      } else { 
         if (isset($_GET['redirect'])) {
             header('Location: ../' . $_GET['redirect']);
         } else {
             header('Location: welcome.php');
         }
      }
      } else {
        $admin_error = "Your Login Name or Password is invalid";
         return $admin_error;
      }
}

function display_username()
{
        if (isset($_SESSION['fb_access_token'])) {
        echo $_SESSION['facebookName']; 
        } else {        
            if (isset($_COOKIE["donotlogout"])) {
            echo $_COOKIE["donotlogout"];
            }
            else {
            echo $_SESSION['login_username'];
            } 
        } 
}

function restrict_login_page()
{
    if((isset($_SESSION['facebookEmail']) || isset($_SESSION['login_username'])))
{
  header("Location: welcome.php");
}
if (isset($_COOKIE["donotlogout"])) {
  $_SESSION['cookie_var'] = 'cookie';
  header('Location: welcome.php');
} 
}

function restrict_welcome_page()
{
    if(((!isset($_SESSION['facebookEmail']) && !isset($_SESSION['login_username']))) && !isset($_SESSION['cookie_var']))
{
  header("Location: login.php");
}
if (isset($_SESSION['cookie_var'])) {
if (!isset($_COOKIE["donotlogout"])) {
  header('Location: logout.php');
} 
}
}

function restrict_user_page($var)
{
    if(((!isset($_SESSION['facebookEmail']) && !isset($_SESSION['login_username']))) && !isset($_SESSION['cookie_var']))
{
  header("Location: login.php");
}
if (isset($_SESSION['cookie_var'])) {
if (!isset($_COOKIE["donotlogout"])) {
  header('Location: logout.php');
} 
}
   include("../database_connection.php");
   $testarray = array();
   $sql = "SELECT * FROM users";
   $result = $conn->query($sql);
   if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) { 
   array_push($testarray, $row['id']);
}
}
   if (!is_numeric($var) || !in_array($var, $testarray )) {
      header ("Location: ../restricted_messages/noinfo.php");
   }  
}

function restrict_forgot_password()
{
  if(isset($_SESSION["login_username"])) 
{
  header("Location: ../admin/welcome.php");
}
}
?>
