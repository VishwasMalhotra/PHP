<?php
 include("studentInfoConfig.php");

session_start();


?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title> Welcome </title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="css/bootstrap.min.css" rel="stylesheet" />
      <link href="css/basic-template.css" rel="stylesheet" />
   </head>
   <body>
		<div class="container">
		<center>
      	<h2>Welcome <?php echo $_SESSION['login_username']; ?>!</h2> 
      	<h3><a href = "logout.php">Sign Out</a></h3>
		</center>
		</div>
      <div style="padding-top: 50px; " class= "container">
         <div class="panel panel-default">
            <div class="panel-heading"><b>Users</b></div>
            <div class="panel-body">
               <div class="table-responsive">
                  <table id="education" class="table table-bordered table-condensed">
                     <tbody>
                        <tr>
                           <th> Name </th>
                           <th> Date of Birth </th>
                           <th> Phone Number </th>
                           <th> E-Mail </th>
                        </tr>
							<?php
								$sql = "SELECT * FROM users";
								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
							  ?>
							  <?php
									$data = array('id'=>$row['id']);
								?>	
							   <tr>
							  	<td><a href="userdetail.php?<?php echo http_build_query($data, '', '&amp;');?>"><?php echo $row['name']; ?></a></td>
							  	<td><?php echo $row['DOB']; ?></td>
							   	<td><?php echo $row['phoneNumber']; ?></td>
							   	<td><?php echo $row['email']; ?></td>
							   </tr>
							  <?php 
								}
									}
							  ?>
                        
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>

     



    	 <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
   </body>
</html>
