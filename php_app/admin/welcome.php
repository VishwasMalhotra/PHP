<?php
include("../shared/header.php");
include("../database_connection.php");
require '../facebook-sdk-v5/autoload.php';
include ("../functions/admin_functions.php");
include ("../functions/admin_page_functions.php");
session_name('adminSession');
restrict_welcome_page();
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title> Welcome </title>     
      <script src="../js/timeoutjs.js"></script>
   </head>
   <body>   
		<div class="container">
		<center>
      	<h2>Welcome <?php 
         display_username();
        ?>!</h2>
        <a class="btn btn-danger" href = "logout.php">Sign Out</a>
        <a class="btn btn-info" href = "../search_form/combinationSearch.php">Search Form</a>
      	<hr>
	    <form  method="get" action="welcome.php"> 
	      <input class="form-control" type="text" name="quickSearch" placeholder="Quick Search"><br/>
	      <input class="btn btn-primary" type="submit" name="submit" value="Search">
        <?php 
        if (isset($_GET['quickSearch'])) {
        ?>
        <a class="btn btn-info" href="welcome.php" role="button">Clear all Filters</a>
        <?php 
        }
        ?>

	    </form>
		</center>
		</div>
		<?php 
			if (!$_GET || $_GET['quickSearch']  == NULL) {
			
		?>
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
                              while($row_unescaped = $result->fetch_assoc()) {   
                              $row = escape_special_char($row_unescaped);
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
<?php 
}
 else {
?>
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
                      $searchstring = $_GET['quickSearch'];

                         $sql = "SELECT * FROM users WHERE id IN (SELECT users.id FROM users JOIN address ON users.id = address.users_id JOIN preference ON users.id = preference.users_id JOIN maritalinfo ON users.id = maritalinfo.users_id JOIN educationqualification ON users.id = educationqualification.users_id JOIN experience ON users.id = experience.users_id JOIN foreigntest ON users.id = foreigntest.users_id WHERE `name` LIKE '%$searchstring%' OR email LIKE '%$searchstring%' OR phoneNumber LIKE '%$searchstring%' OR detailedAddress LIKE '%$searchstring%' OR city LIKE '%$searchstring%' OR state LIKE '%$searchstring%' OR level LIKE '%$searchstring%' OR fieldSubjects LIKE '%$searchstring%' OR Board LIKE '%$searchstring%' OR employerName LIKE '%$searchstring%' OR employerAddress LIKE '%$searchstring%' OR designation LIKE '%$searchstring%' OR ieltsOrToefl LIKE '%$searchstring%' OR marritalStatus LIKE '%$searchstring%' OR spouseName LIKE '%$searchstring%' OR preferredCity LIKE '%$searchstring%' group BY users.id)";
                   
                            $result = $conn->query($sql);

                         if ($result->num_rows > 0) {
                              while($row_unescaped = $result->fetch_assoc()) {   
                              $row = escape_special_char($row_unescaped);
                  ?>

                           <?php
                                  $data = array('id'=>$row['id']);

                           ?>
                                 <tr>
                                  <td><a href="userdetail.php?<?php echo http_build_query($data, '', '&amp;');?>"><?php echo $row['name']; ?></td>
                                  <td><?php echo $row['DOB']; ?></td>
                                  <td><?php echo $row['phoneNumber']; ?></td>
                                  <td><?php echo $row['email']; ?></td>
                                 </tr>
                  <?php 
                         }
                            }
                              }
                  ?> 
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
   </body>
</html>
