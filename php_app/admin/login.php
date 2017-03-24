 <?php
   include("../database_connection.php");
   include("../shared/header.php");
  require '../facebook-sdk-v5/autoload.php';
   include ("../functions/admin_functions.php");
   session_name('adminSession');
   restrict_login_page();
      $error = '';

      if($_SERVER["REQUEST_METHOD"] == "POST") {
        $error = admin_login();
      }

?>
<html>
   <head>
      <title>Login Page</title>
   </head>
   <body class="login_body">
      <br>
      <div class="container bread">
         <ul class="breadcrumb">
            <li><a href="../home.php"> Home </a></li>
            <li class="active"> Admin Login </li>
         </ul>
      </div>
      <div align = "center">
         <div id="main_login">
            <div id="login_text">
               <b>Login</b>
            </div>
            <div id="login_container">
               <form method = "post">
                  <label class="login_label">UserName  :<br></label>
                  <input type = "text" name = "username" class = "box" /><br /><br />
                  <label class="login_label">Password  :<br>
                  </label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type="checkbox" name="remember" id="remember" ?>
                  <label class="login_label" for="remember-me">Remember me</label><br/><br />
                  <input class="btn btn-success" type = "submit" value = " Submit "/><br />
               </form>
               <a class="btn btn-danger" href="../accounts/forgotPassword.php">Forgot/Reset Password</a>
               <br>
               <div id="login_error"><?php echo $error; ?></div>
               <div class="btn-group">
                  <?php 
                    login_via_facebook();
                  ?>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>