<?php
   include("config.php");
   session_start();
      $error = '';

      if($_SERVER["REQUEST_METHOD"] == "POST") {
         $_SESSION['login_username'] = $_POST['username'];

         $myusername = $conn->real_escape_string($_POST['username']);
         $mypassword = $conn->real_escape_string($_POST['password']);
      
         $sql = "SELECT id FROM admin WHERE username = BINARY('$myusername') and password = BINARY('$mypassword')";
         $result = $conn->query($sql);
         $row = $result->fetch_array(MYSQLI_ASSOC);
         $count = $result->num_rows;

      if($count == 1) {
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>					   				
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         
         .box {
            border:#666666 solid 1px;
         }
      </style> 
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
            <div style = "margin:30px">
               <form method = "post">
                  <label>UserName  :<br></label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :<br></label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
                  <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
            </div>
         </div>
      </div>
   </body>
</html>