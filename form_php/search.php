<?php 
 include("studentInfoConfig.php");

session_start();


?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title> Search </title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="css/bootstrap.min.css" rel="stylesheet" />
      <link href="css/basic-template.css" rel="stylesheet" />
   </head>
   <body>
   <?php
      $searchstring = $_GET['quickSearch'];

         $sql = "SELECT name FROM users WHERE id IN (SELECT users.id FROM users JOIN address ON users.id = address.users_id JOIN preference ON users.id = preference.users_id JOIN maritalinfo ON users.id = maritalinfo.users_id JOIN educationqualification ON users.id = educationqualification.users_id JOIN experience ON users.id = experience.users_id JOIN foreigntest ON users.id = foreigntest.users_id WHERE `name` LIKE '%$searchstring%' OR email LIKE '%$searchstring%' OR phoneNumber LIKE '%$searchstring%' OR detailedAddress LIKE '%$searchstring%' OR city LIKE '%$searchstring%' OR state LIKE '%$searchstring%' OR level LIKE '%$searchstring%' OR fieldSubjects LIKE '%$searchstring%' OR Board LIKE '%$searchstring%' OR employerName LIKE '%$searchstring%' OR employerAddress LIKE '%$searchstring%' OR designation LIKE '%$searchstring%' OR ieltsOrToefl LIKE '%$searchstring%' OR marritalStatus LIKE '%$searchstring%' OR spouseName LIKE '%$searchstring%' OR preferredCity LIKE '%$searchstring%' group BY users.id)";
   
            $result = $conn->query($sql);

         if ($result->num_rows > 0) {
         while($row = $result->fetch_assoc()) {
  ?>
        <ul>
           <li>
           Name:
              <?php print_r($row);
               ?>
           </li>
        </ul>
  <?php 
         }
            }
  ?> 

    	 <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
   </body>
</html>
