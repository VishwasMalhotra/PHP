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
         <h3>Forgot Password Form</h3>
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "color:black; padding:3px;"><b>Please enter your credentials.</b></div><hr>
            <div style = "margin:30px">
               <form name="ForgotPassword" action="changePassword.php" method = "post">
                  <label>Your Username  :<br></label><input type = "text" name = "username" class = "box"/><br /><br />
                  <input type = "submit" value = "Sent Mail"/><br />
               </form>
            </div>
         </div>
      </div>
   </body>
</html>
