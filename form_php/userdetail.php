<?php
   session_start();
    include("studentInfoConfig.php");
   $userdetail_id = $_GET['id'];
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
                              $row = $result->fetch_assoc();    
                           ?>
                        <tr>
                           <th>Name</th>
                           <td><b><?php echo $row['name']; ?></b></td>
                        </tr>
                        <tr>
                           <th>Date of birth</th>
                           <td><?php echo $row['DOB']; ?></td>
                        </tr>
                        <tr>
                           <th>E-mail</th>
                           <td><?php echo $row['email']; ?></td>
                        </tr>
                        <tr>
                           <th>Phone Number</th>
                           <td><?php echo $row['phoneNumber']; ?></td>
                        </tr>
                        <tr>
                           <th>Visa Rejection</th>
                           <td><?php echo $row['visa_rejection']; ?></td>
                        </tr>
                       <?php 
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
                              $row = $result->fetch_assoc();    
                           ?>
                        <tr>
                           <th>Address</th>
                           <td><b><?php echo $row['detailedAddress']; ?></b></td>
                        </tr>
                        <tr>
                           <th>City</th>
                           <td><?php echo $row['city']; ?></td>
                        </tr>
                        <tr>
                           <th>State</th>
                           <td><?php echo $row['state']; ?></td>
                        </tr>
                        <tr>
                           <th>Zipcode</th>
                           <td><?php echo $row['zipcode']; ?></td>
                        </tr>
                       <?php 
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
                              $row = $result->fetch_assoc();    
                           ?>
                        <tr>
                           <th>Address</th>
                           <td><b><?php echo $row['marritalStatus']; ?></b></td>
                        </tr>
                        <tr>
                           <th>City</th>
                           <td><?php echo $row['spouseName']; ?></td>
                        </tr>
                        <tr>
                           <th>State</th>
                           <td><?php echo $row['dateofMarriage']; ?></td>
                        </tr>
                        <tr>
                           <th>Zipcode</th>
                           <td><?php echo $row['spouseOccupation']; ?></td>
                        </tr>
                        <tr>
                           <th>Zipcode</th>
                           <td><?php echo $row['spouseEducation']; ?></td>
                        </tr>
                       <?php 
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
                              $row = $result->fetch_assoc();    
                           ?>
                        <tr>
                           <th>Preferred Intake</th>
                           <td><?php echo $row['preferredIntake']; ?></td>
                        </tr>
                        <tr>
                           <th>Preferred City</th>
                           <td><?php echo $row['preferredCity']; ?></td>
                        </tr>
                        <tr>
                           <th>Preferred Stream</th>
                           <td><?php echo $row['preferredStream']; ?></td>
                        </tr>
                       <?php 
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
                              while($row = $result->fetch_assoc()) {   
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
                              while($row = $result->fetch_assoc()) {   
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
                              while($row = $result->fetch_assoc()) {   
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
      <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
   </body>
</html>
