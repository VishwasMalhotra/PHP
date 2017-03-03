<?php 
if (isset($_GET["queryParam"])) {
include("studentInfoConfig.php");
$error = '';
if($_SERVER["REQUEST_METHOD"] == "POST") {
if ($_POST["newpassword"] == $_POST["confirmpassword"]) {
   $newpassword = md5($_POST["newpassword"]);
   $sql = "UPDATE admin JOIN forget_password ON forget_password.admin_id = admin.id
         SET `password`='{$newpassword}'
         WHERE query_param = '{$_GET["queryParam"]}'";
         $result = $conn->query($sql);

   $sql="DELETE FROM forget_password
         WHERE query_param = '{$_GET["queryParam"]}'";
         $result = $conn->query($sql);

 header('Location: resetPassword.php');
} else {
   $error = 'Password does not Match!';
}
}
?>
<!DOCTYPE html>
<html>
<head>
   <title>Reset Password!</title>
</head>
<body>
<form name="resetPasswordForm" action="resetPasswordForm.php?queryParam=<?php echo $_GET["queryParam"]; ?>" method = "post">
<div align = "center">
   <h3>Password Reset Form</h3>
   <div style = "width:300px; border: solid 1px #333333; " align = "left">
      <div style = "color:black; padding:3px;"><b>Please enter the details.</b></div><hr>
      <div style = "margin:30px">
            <?php 
               $query_parameter = $_GET["queryParam"];
               $sql = "SELECT username FROM admin JOIN forget_password ON forget_password.admin_id = admin.id WHERE query_param = '{$query_parameter}'";
               $result = $conn->query($sql);
               $row = $result->fetch_array(MYSQLI_ASSOC);
               $user = $row["username"];
               if ($user == NULL) {
                  echo 'User Does not Exist';
               } else {

            ?>
            <label>Welcome <b><?php echo $user ?></b><br><br></label>
            <label>New Password  :<br></label><input type = "Password" name = "newpassword" class = "box"/><br /><br />
            <label>Confirm Password  :<br></label><input type = "Password" name = "confirmpassword" class = "box"/><br /><br />
            <input type = "submit" value = "Reset Password"/><br />
            <h3><?php echo $error?></h3>
      </div>
   </div>
</div>
   
</form>
<?php 
}
}
?>
</body>
</html>
