 <?php
include("../shared/header.php");
include("../database_connection.php");
include ("../functions/admin_functions.php");
include ("../functions/admin_page_functions.php");
session_name('adminSession');
$userdetail_id = $_GET['id'];
restrict_user_page($userdetail_id);
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
            <a class="btn btn-info" href = "welcome.php">Back to users</a>
            <a class="btn btn-danger" href = "logout.php">Sign Out</a>
         </center>
      </div>
      <div style="padding-top: 50px; " class= "container">
         <div class="panel panel-default">
            <div class="panel-heading"><b>Personal Information</b></div>
            <div class="panel-body">
               <div class="table-responsive">
                  <table id="education" class="table table-bordered table-condensed">
                     <tbody>
                        <?php 
                           $sql = "SELECT * FROM users WHERE id =$userdetail_id";
                           $result = $conn->query($sql);
                           
                           if ($result->num_rows > 0) {
                              $row_unescaped = $result->fetch_assoc();
                              $row = escape_special_char($row_unescaped);
                              $users_array = array(
                                  'Name' => 'name',
                                  'Date of birth' => 'DOB',
                                  'E-mail' => 'email',
                                  'Phone Number' => 'phoneNumber',
                                  'Visa Rejection' => 'visa_rejection'
                              );
                              user_details_table($users_array, $row);
                           }
                           ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
      <div class= "container">
         <div class="panel panel-default">
            <div class="panel-heading"><b>Residential Information</b></div>
            <div class="panel-body">
               <div class="table-responsive">
                  <table id="education" class="table table-bordered table-condensed">
                     <tbody>
                        <?php 
                           $sql = "SELECT * FROM users LEFT JOIN address ON users.id = address.users_id WHERE users_id = $userdetail_id";
                           $result = $conn->query($sql);
                           
                           if ($result->num_rows > 0) {
                              $row_unescaped = $result->fetch_assoc();
                              $row = escape_special_char($row_unescaped);
                              $address_array = array(
                                  'Address' => 'detailedAddress',
                                  'City' => 'city',
                                  'State' => 'state',
                                  'Zipcode' => 'zipcode'
                              );
                              user_details_table($address_array, $row);    
                           }
                           ?>
                     
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
      <div class= "container">
         <div class="panel panel-default">
            <div class="panel-heading"><b>Marital Information</b></div>
            <div class="panel-body">
               <div class="table-responsive">
                  <table id="education" class="table table-bordered table-condensed">
                     <tbody>
                        <?php 
                           $sql = "SELECT * FROM users LEFT JOIN maritalinfo ON users.id = maritalinfo.users_id WHERE users_id =$userdetail_id";
                           $result = $conn->query($sql);
                           
                           if ($result->num_rows > 0) {
                              $row_unescaped = $result->fetch_assoc();
                              $row = escape_special_char($row_unescaped);
                              $marital_array = array(
                                  'Marital Status' => 'marritalStatus',
                                  'Spouse Name' => 'spouseName',
                                  'Date of Marriage' => 'dateofMarriage',
                                  'Spouse Occupation' => 'spouseOccupation',
                                  'Spouse Education' => 'spouseEducation'
                              );
                              user_details_table($marital_array, $row);  
                              }   
                           ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
      <div class= "container">
         <div class="panel panel-default">
            <div class="panel-heading"><b>Preferences</b></div>
            <div class="panel-body">
               <div class="table-responsive">
                  <table id="education" class="table table-bordered table-condensed">
                     <tbody>
                        <?php 
                           $sql = "SELECT * FROM users LEFT JOIN preference ON users.id = preference.users_id  WHERE users_id =$userdetail_id";
                           $result = $conn->query($sql);
                           
                           if ($result->num_rows > 0) {
                              $row_unescaped = $result->fetch_assoc();
                              $row = escape_special_char($row_unescaped); 
                              $preference_array = array(
                                  'Preferred Intake' => 'preferredIntake',
                                  'Preferred City' => 'preferredCity',
                                  'Preferred Stream' => 'preferredStream'
                              );
                              user_details_table($preference_array, $row);
                           }                                 
                           ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
      <div class= "container">
         <div class="panel panel-default">
            <div class="panel-heading"><b>Educational Qualification</b></div>
            <div class="panel-body">
               <div class="table-responsive">
                  <table id="education" class="table table-bordered table-condensed">
                     <tbody>
                        <tr>
                           <th>Level</th>
                           <th>Field/Subjects</th>
                           <th>Year of Passing</th>
                           <th>Percentage</th>
                           <th>Backlog</th>
                           <th>Board/University</th>
                        </tr>
                        <?php 
                           $sql = "SELECT * FROM users LEFT JOIN educationqualification ON users.id = educationqualification.users_id  WHERE users_id =$userdetail_id";
                           $result = $conn->query($sql);
                           
                           if ($result->num_rows > 0) { 
                              while($row_unescaped = $result->fetch_assoc()) {   
                              $row = escape_special_char($row_unescaped);
                           ?>
                        <tr>
                           <td><?php echo $row['level']; ?></td>
                           <td><?php echo $row['fieldSubjects']; ?></td>
                           <td><?php echo $row['yearOfPassing']; ?></td>
                           <td><?php echo $row['percentage']; ?></td>
                           <td><?php echo $row['backlog']; ?></td>
                           <td><?php echo $row['Board']; ?></td>
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
      <div class= "container">
         <div class="panel panel-default">
            <div class="panel-heading"><b>Entrance Test</b></div>
            <div class="panel-body">
               <div class="table-responsive">
                  <table id="education" class="table table-bordered table-condensed">
                     <tbody>
                        <tr>
                           <th> Type of Test </th>
                           <th> Test Taken Date </th>
                           <th> Listening </th>
                           <th> Reading </th>
                           <th> Writing </th>
                           <th> Speaking </th>
                           <th> Overall Band </th>
                        </tr>
                        <?php 
                           $sql = "SELECT * FROM users LEFT JOIN foreigntest ON users.id = foreigntest.users_id  WHERE users_id =$userdetail_id";
                           $result = $conn->query($sql);
                           
                           if ($result->num_rows > 0) { 
                              while($row_unescaped = $result->fetch_assoc()) {   
                              $row = escape_special_char($row_unescaped); 
                           ?>
                        <tr>
                           <td><?php echo $row['ieltsOrToefl']; ?></td>
                           <td><?php echo $row['testDate']; ?></td>
                           <td><?php echo $row['listening']; ?></td>
                           <td><?php echo $row['reading']; ?></td>
                           <td><?php echo $row['writing']; ?></td>
                           <td><?php echo $row['speaking']; ?></td>
                           <td><?php echo $row['overallBand']; ?></td>
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
      <div class= "container">
         <div class="panel panel-default">
            <div class="panel-heading"><b>Experience Information</b></div>
            <div class="panel-body">
               <div class="table-responsive">
                  <table id="education" class="table table-bordered table-condensed">
                     <tbody>
                        <tr>
                           <th> Employer Name </th>
                           <th> Employer Address </th>
                           <th> Designation </th>
                           <th> Salary </th>
                           <th> Start Date </th>
                           <th> End Date </th>
                        </tr>
                        <?php 
                           $sql = "SELECT * FROM users LEFT JOIN experience ON users.id = experience.users_id  WHERE users_id =$userdetail_id";
                           $result = $conn->query($sql);
                           
                           if ($result->num_rows > 0) { 
                              while($row_unescaped = $result->fetch_assoc()) {   
                              $row = escape_special_char($row_unescaped); 
                           ?>
                        <tr>
                           <td><?php echo $row['employerName']; ?></td>
                           <td><?php echo $row['employerAddress']; ?></td>
                           <td><?php echo $row['designation']; ?></td>
                           <td><?php echo $row['salary']; ?></td>
                           <td><?php echo $row['startFrom']; ?></td>
                           <td><?php echo $row['endTo']; ?></td>
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
         $sql = "SELECT * FROM users WHERE id =$userdetail_id";
         $result = $conn->query($sql);

         if ($result->num_rows > 0) {
         $row = $result->fetch_assoc(); 
         $x = $row['id'];
         ?>

      <div class= "container">
         <div class="panel panel-default">
            <div class="panel-heading"><b>User File</b></div>
            <div class="panel-body">
            <?php
            if ($row['userfile'] == NULL) {
            echo "No file uploaded.";
            } else {
             ?>
               <a href="download.php?id=<?php echo $row['id'] ?>">Download CV</a>
               <?php 
               }
                ?>
            </div>
         </div>
      </div>
      <?php
         }
      ?>
      <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
   </body>
</html>
