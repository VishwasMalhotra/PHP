<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
   <title>Stage 3</title>
</head>
<body>

               <?php  
               $x = array('fieldSubjects', 'yearOfPassing', 'percentage', 'backlog', 'Board');
               for ($i=0; $i < 5 ; $i++) { 
                  print_r($_SESSION['educationOfuser'][$i][$x[0]]);
               }
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
                  VALUES ('{$_SESSION['birthYear']}"."{$_SESSION['birthMonth']}"."{$_SESSION['birthDate']}',
                  '{$_SESSION["firstname"]} "."{$_SESSION["lastname"]}',
                  '{$_SESSION["contact_email"]}',
                  '{$_SESSION["contact_phone"]}',
                  '{$_SESSION["visa_rejection"]}')";
                  

                  $query = $conn->query($sql);
                  $userId= $conn->insert_id;


                  $sql = "INSERT INTO address(users_id, detailedAddress, city, state, zipcode)
                  VALUES ('$userId',
                  '{$_SESSION["addressOne"]} "."{$_SESSION["addressTwo"]}',
                  '{$_SESSION["address_city"]}',
                  '{$_SESSION["address_state"]}',
                  '{$_SESSION["address_zipcode"]}')";
                

                  $conn->query($sql);


                  $sql = "INSERT INTO preference(users_id, preferredCity, preferredIntake, preferredStream)
                  VALUES ('$userId',
                  '{$_SESSION["preferredClientCity"]}',
                  '{$_SESSION["preferredClientMonth"]}-"."{$_SESSION["preferredClientYear"]}',
                  '{$_SESSION["preferredClientStream"]}')";

                  $conn->query($sql);


                  if($_SESSION["relationshipStatus"] == 'Married'){

                  $sql = "INSERT INTO maritalinfo(users_id, marritalStatus, spouseName, dateofMarriage, spouseOccupation, spouseEducation)
                  VALUES ('$userId',
                  '{$_SESSION["relationshipStatus"]}',
                  '{$_SESSION["spouseFirstName"]}"."{$_SESSION["spouseLastName"]}',
                  '{$_SESSION["dateofMarriage"]}',
                  '{$_SESSION["spouseOccupation"]}',
                  '{$_SESSION["spouseEducation"]}')";
                
                  echo $sql;
                  $conn->query($sql);                  
                  }

                  
                   

                  $sql = "COMMIT";
                  $conn->query($sql);

                  $conn->close();
               ?>

</body>
</html>