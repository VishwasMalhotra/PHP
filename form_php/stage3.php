<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title> Confirmation Page </title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="css/bootstrap.min.css" rel="stylesheet" />
      <link href="css/basic-template.css" rel="stylesheet" />
      <link rel="stylesheet" type="text/css" href="stylesheet.css" />
   </head>
   <body>
             <?php  
                  $servername = "localhost";
                  $username = "root";
                  $password = "";
                  $dbname = "student_information";

                  $conn = new mysqli($servername, $username, $password, $dbname);
                  if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                  } 

                  $sql = "START TRANSACTION";
                  $conn->query($sql);


                  $sql = "INSERT INTO users (DOB, name, email, phoneNumber, visa_rejection)
                  VALUES ('{$_SESSION['birthYear']}"."/{$_SESSION['birthMonth']}"."/{$_SESSION['birthDate']}',
                  '{$_SESSION["firstname"]} "."{$_SESSION["lastname"]}',
                  '{$_SESSION["contact_email"]}',
                  '{$_SESSION["contact_phone"]}',
                  '{$_SESSION["visa_rejection"]}');";

                  $query = $conn->query($sql);
                  $userId= $conn->insert_id;


                  $sql = "INSERT INTO address(users_id, detailedAddress, city, state, zipcode)
                  VALUES ('$userId',
                  '{$_SESSION["addressOne"]} "."{$_SESSION["addressTwo"]}',
                  '{$_SESSION["address_city"]}',
                  '{$_SESSION["address_state"]}',
                  '{$_SESSION["address_zipcode"]}');";
                

                  $conn->query($sql);


                  $sql = "INSERT INTO preference(users_id, preferredCity, preferredIntake, preferredStream)
                  VALUES ('$userId',
                  '{$_SESSION["preferredClientCity"]}',
                  '{$_SESSION["preferredClientMonth"]}-"."{$_SESSION["preferredClientYear"]}',
                  '{$_SESSION["preferredClientStream"]}');";

                  $conn->query($sql);


                  if($_SESSION["relationshipStatus"] == 'Married'){

                  $sql = "INSERT INTO maritalinfo(users_id, marritalStatus, spouseName, dateofMarriage, spouseOccupation, spouseEducation)
                  VALUES ('$userId',
                  '{$_SESSION["relationshipStatus"]}',
                  '{$_SESSION["spouseFirstName"]}"."{$_SESSION["spouseLastName"]}',
                  '{$_SESSION["dateofMarriage"]}',
                  '{$_SESSION["spouseOccupation"]}',
                  '{$_SESSION["spouseEducation"]}');";

                  $conn->query($sql);                  
                  }


               $levelOfEdu = array('Matric(10th)', '10+2', 'Graduation', 'Post-Graduation', 'Diploma', 'Any Other Qualification');
               $x = array('fieldSubjects', 'yearOfPassing', 'percentage', 'backlog', 'Board');
               $str= '';
                for ($row=0; $row < count($levelOfEdu); $row++) { 
                  for ($cell=0; $cell < 5; $cell++) {

                     if ($_SESSION['educationOfuser'][$row][$x[$cell]] == '') {
                        $str .= 'NULL,';
                     } else {
                       $str .= '\''.$_SESSION['educationOfuser'][$row][$x[$cell]] .'\',';
                     }
                  }

                  

                  $xyz = rtrim($str, ",");
                  $sql = "INSERT INTO educationqualification(users_id, level, fieldSubjects, yearOfPassing, percentage, backlog, Board)
                  VALUES('$userId','".$levelOfEdu[$row]."',$xyz);";
                  $str = '';
                  $conn->query($sql);
                 }
                  
               $y = array('typeofexam', 'dateoftest', 'listening', 'reading', 'writing', 'speaking', 'overallBand');
               $ftstr= '';
                 for ($cell=0; $cell < 7; $cell++) {
                     if ($_SESSION['foreignTest'][$cell][$y[$cell]] == '') {
                        $ftstr .= 'NULL,';
                     } else {
                       $ftstr .= '\''.$_SESSION['foreignTest'][$cell][$y[$cell]] .'\',';
                     }        
                  $foreignTestString = rtrim($ftstr, ",");
                 }
                  $sql = "INSERT INTO foreigntest(users_id, ieltsOrToefl, testDate, listening, reading, writing, speaking, overallBand)
                  VALUES('$userId',$foreignTestString);";
                  $ftstr = '';
                  $conn->query($sql);                              

                $z = array('employerName', 'employerAddress', 'designation', 'salary', 'from', 'to');
               $empstr= '';
                 for ($cell=0; $cell < 6; $cell++) {
                     if ($_SESSION['userExperience'][$cell][$z[$cell]] == '') {
                        $empstr .= 'NULL,';
                     } else {
                       $empstr .= '\''.$_SESSION['userExperience'][$cell][$z[$cell]] .'\',';
                     }        
                  $employerString = rtrim($empstr, ",");
                 }
                  $sql = "INSERT INTO experience(users_id, employerName, employerAddress, designation, salary, startFrom, endTo)
                  VALUES('$userId',$employerString);";
                  $empstr = '';
                  $conn->query($sql);  



                  $sql = "COMMIT";
                  $conn->query($sql);

                  $conn->close();
               ?>
<div class="jumbotron text-md-center">
  <center>
     <h1>Thank You!</h1>
  <p><strong>Thanks <?php echo $_SESSION["firstname"]; ?> for contacting us!
      We will get back to you as soon as possible.</strong></p>
  <hr>
  <p>
    Know more on <a href="https://www.educations.com/">our website.</a>
  </p>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="login" role="button">Continue to admin login</a>
  </p>
  </center>
</div>  
    
    <div class="footer-bottom">
        <div class="container">
            <p class="pull-left"> Copyright © <strong>Company Name Pvt. Ltd.</strong> All right reserved. </p>
        </div>
    </div>
</footer>             

<?php
session_unset(); 
session_destroy(); 
?>  
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
   </body>
</html>
