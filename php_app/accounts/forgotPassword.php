<?php
include ("../functions/admin_functions.php");
session_name('adminSession');
restrict_forgot_password();
?>
<html>					   				
   <head>
      <title>Login Page</title>
      <link rel='stylesheet' type='text/css' href='../css/stylesheet.css' />
   </head>
   
   <body class="forgot_body">
      <div align = "center">
         <h3>Forgot Password Form</h3>
         <div id="forgot_container">
            <div id="forgot_line"><b>Please enter your credentials.</b></div><hr>
            <div id="login_container">
               <form name="ForgotPassword" action="changePassword.php" method = "post">
                  <label id="forgot_label">Your Username  :<br></label><input type = "text" name = "username" class = "box"/><br /><br />
                  <input type = "submit" value = "Send Mail"/><br />
               </form>
            </div>
         </div>
      </div>
   </body>
</html>
