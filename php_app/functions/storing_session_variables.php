<?php
   session_name('user_form');
   session_start();

function store_in_session($session_variables) 
{
include("../database_connection.php");
    foreach ($session_variables as $session_var => $post_var) { 
     $_SESSION[$session_var] = htmlspecialchars($conn->real_escape_string($_POST[$post_var]), ENT_QUOTES, "UTF-8");
    }
}

function session_education()    
{
  include("../database_connection.php");
   $levelOfEdu = array('Matric(10th)', '10+2', 'Graduation', 'Post-Graduation', 'Diploma', 'Any Other Qualification');
   $x = array('fieldSubjects', 'yearOfPassing', 'percentage', 'backlog', 'Board');


  $_SESSION['educationOfuser'] = array();
  $y = $_POST['eduQual'];
    foreach ($y as $i => $r) {
      $_SESSION['educationOfuser'][$i] = array();
      foreach ($r as $session_var => $post_var) { 
          $_SESSION['educationOfuser'][$i][$session_var] = mysqli_real_escape_string($conn, $_POST['eduQual'][$i][$session_var]);
      }
    }
      print_r($_SESSION['educationOfuser']);


    for ($row=0; $row < count($levelOfEdu); $row++) { 
      echo "<tr>"."<th>".$levelOfEdu[$row];
     for ($cell=0; $cell < 5; $cell++) {
       echo "<td><input readonly type='text' class='form-control table' name='eduQual[$row][".$x[$cell]."]'
      value='".htmlspecialchars($_SESSION['educationOfuser'][$row][$x[$cell]], ENT_QUOTES, "UTF-8")."'/>";
     }
    }   
}

function session_ielts() 
{
  include("../database_connection.php");

  $_SESSION['foreignTest'] = array();
  $x = $_POST['ielts'];
    foreach ($x as $i => $r) {
      $_SESSION['foreignTest'][$i] = array();
      foreach ($r as $session_var => $post_var) { 
          $_SESSION['foreignTest'][$i][$session_var] = mysqli_real_escape_string($conn, $_POST['ielts'][$i][$session_var]);
      }
    }


// $_SESSION['foreignTest'] = $_POST['ielts'];
  $y = array('typeofexam', 'dateoftest', 'listening', 'reading', 'writing', 'speaking', 'overallBand');
   for ($row=0; $row < 1; $row++) { 
     echo "<tr>";
    for ($cell=0; $cell < 7; $cell++) {
      echo "<td><input readonly type='text' class='form-control table' name='ielts[$cell][".$y[$cell]."]'
      value='".htmlspecialchars($_SESSION['foreignTest'][$cell][$y[$cell]], ENT_QUOTES, "UTF-8")."'/>";
    }
   }
}

function session_experience()
{
  include("../database_connection.php");

  $_SESSION['userExperience'] = array();
  $x = $_POST['experience'];
    foreach ($x as $i => $r) {
      $_SESSION['userExperience'][$i] = array();
      foreach ($r as $session_var => $post_var) { 
          $_SESSION['userExperience'][$i][$session_var] = mysqli_real_escape_string($conn, $_POST['experience'][$i][$session_var]);
      }
    }


  $z = array('employerName', 'employerAddress', 'designation', 'salary', 'from', 'to');
   for ($row=0; $row < 1; $row++) { 
     echo "<tr>";
    for ($cell=0; $cell < 6; $cell++) {
      echo "<td><input readonly type='text' class='form-control table' name='experience[$cell][".$z[$cell]."]''
      value='".htmlspecialchars($_SESSION['userExperience'][$cell][$z[$cell]], ENT_QUOTES, "UTF-8")."'/>";
    }
   }    
}

function upload_file() 
{
        if(isset($_SESSION['fileToUpload'])) {
         $pathString = $_SESSION['fileNametoDisplay'];
          echo "You have selected the file :"."<label>".$pathString."</label>";

        } else  {

        $fileLocation = $_SERVER['DOCUMENT_ROOT']."/tmp/";
        $fileName = $fileLocation . basename($_FILES["fileToUpload"]["name"]);
        $uploadVariable = 1;
        if(isset($_POST["submit"])) {
                $uploadVariable = 1;
            } else {
                $uploadVariable = 0;
            }
        if ($uploadVariable == 0) {
            echo "You haven't selected any file to upload.";
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $fileName)) {
                echo "You have selected the file :"."<label>".basename($_FILES["fileToUpload"]["name"])."</label>";
              $_SESSION['fileToUpload'] = $fileName;
              $_SESSION['fileNametoDisplay'] = basename($_FILES["fileToUpload"]["name"]);
                
            } else {
                echo "<label>You haven't selected any file to upload.</label>";
            }
        }                    
        }
}


?>