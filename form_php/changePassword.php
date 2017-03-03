<?php  
include("studentInfoConfig.php");
if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
		$myusername = $conn->real_escape_string($_POST['username']);
         $sql = "SELECT id FROM admin WHERE username = BINARY('$myusername')";
         $result = $conn->query($sql);
         $row = $result->fetch_array(MYSQLI_ASSOC);
         $count = $result->num_rows;
         $admin_id = $row['id'];
      if($count == 1) 
      {

		$salt = mt_rand();
		$password = hash('md5', $salt.$myusername);
		$passwordurl = "http://52.40.58.82/resetPasswordForm.php?queryParam=".$password;
		echo "<a>".$passwordurl."</a>";

		$sql = "INSERT INTO forget_password(admin_id, query_param)
		VALUES ('{$admin_id}', '{$password}')";
		$result = $conn->query($sql);
      } 
      else 
      {
         echo "Username does not exist!";
      }
   }

?>
