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
      <nav class="navbar navbar-default" role="navigation">
         <div class="container">
            <div class="navbar-header">
               <a class="navbar-brand" href="#">
               <img src="companyLogo.png" class="logo" />
               </a>
            </div>
         </div>
      </nav>   
      <div class="row">
         <div style="text-align: center;" class="col-md-12">
            <h3> Please confirm your credentials </h3>
         </div>
      </div>
      <div class= "container padding-top-10">
         <div class="panel panel-default">
            <div class="panel-heading">Student Information Form</div>
            <div class="panel-body">
               <form id="form1" action="stage3.php" method="POST">
                  <div class="row">
                     <div class="col-md-12 padding-top-10">
                  <label for="firstName" class="control-label">Name:</label>
                         <?php
                           $_SESSION['firstname'] = $_POST["firstName"];
                           $_SESSION["lastname"] = $_POST["lastName"];
                              echo $_SESSION['firstname']." ".$_SESSION["lastname"];
                        ?> 
                     </div>
                  </div>
                  <div class="row padding-top-10">
                     <div class="col-md-12">
                  <label for="address1" class="control-label">Address:</label>
                        <?php
                           $_SESSION["addressOne"] = $_POST["address1"];
                           $_SESSION["addressTwo"] = $_POST["address2"];
                           echo $_SESSION["addressOne"]." ".$_SESSION["addressTwo"];
                        ?>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-4 padding-top-10">
                        <label for="city" class="control-label">City:</label>
                        <?php
                           $_SESSION["address_city"] = $_POST["city"];
                           echo $_SESSION["address_city"];
                        ?>
                     </div>
                     <div class="col-md-4 padding-top-10">
                        <label for="state" class="control-label">State / Region:</label>
                        <?php
                           $_SESSION["address_state"] = $_POST["state"];
                           echo $_SESSION["address_state"];
                        ?>
                     </div>
                     <div class="col-md-4 padding-top-10">
                        <label for="zipcode" class="control-label">Zipcode:</label>
                        <?php
                           $_SESSION["address_zipcode"] = $_POST["zipcode"];
                           echo $_SESSION["address_zipcode"];
                        ?>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-8 padding-top-10">
                        <label for="email" class="control-label">E-mail:</label>
                        <?php
                           $_SESSION["contact_email"] = $_POST["email"];
                           echo $_SESSION["contact_email"];
                        ?>
                     </div>
                     <div class="col-md-4 padding-top-10">
                        <label for="phone" class="control-label">Phone No:</label>
                        <?php
                           $_SESSION["contact_phone"] = $_POST["phone"];
                           echo $_SESSION["contact_phone"];
                        ?>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-8 padding-top-10">
                        <label class="control-label">Date of Birth:</label>
                              <?php
                                 $_SESSION["birthDate"] = $_POST['dateofbirthdate'];
                                 $_SESSION["birthMonth"] = $_POST['dateofbirthmonth'];
                                 $_SESSION["birthYear"] = $_POST['dateofbirthyear'];
                                 echo $_SESSION["birthDate"]."-".$_SESSION["birthMonth"]."-".$_SESSION["birthYear"];
                              ?> 
                     </div>
                     <div class="col-md-4 padding-top-10">
                        <label class="control-label">Marital Status:</label>
                              <?php
                                 $_SESSION["relationshipStatus"] = $_POST["maritalStatus"];
                                 echo $_SESSION["relationshipStatus"];
                              ?>
                     </div>
                  </div>
                     <?php
                        if($_POST['maritalStatus'] == 'Married'){
                     ?>
                  <div class="row">
                     <div class="col-md-8 padding-top-10">
                      <label for="spousefirstName" class="control-label">Spouse Name:</label>
                        <?php
                           $_SESSION["spouseFirstName"] = $_POST["spousefirstName"];
                           $_SESSION["spouseLastName"] = $_POST["spouselastName"];
                              echo $_SESSION["spouseFirstName"]." ".$_SESSION["spouseLastName"];
                        ?>
                     </div>
                     <div class="col-md-4 padding-top-10">
                        <label for="DOM" class="control-label">Date of Marriage:</label>
                              <?php
                                 $_SESSION["dateofMarriage"] = $_POST["DOM"];
                                 echo $_SESSION["dateofMarriage"];
                              ?>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-8 padding-top-10">
                        <label for="spouseJob" class="control-label">Spouse Occupation:</label>
                              <?php
                                 $_SESSION["spouseOccupation"] = $_POST["spouseJob"];
                                 echo $_SESSION["spouseOccupation"];
                              ?>                        
                     </div>
                     <div class="col-md-4 padding-top-10">
                        <label for="zipcode" class="control-label">Spouse Educational Qualification:</label>
                              <?php
                                 $_SESSION["spouseEducation"] = $_POST["educationQualification"];
                                 echo $_SESSION["spouseEducation"];
                              ?>                        
                     </div>
                  </div>
                     <?php
                        }
                     ?>
                  <div class="row">
                     <div class="col-md-4 padding-top-10">
                              <label for="preferredCity" class="control-label">Preferred City/Country:</label>
                              <?php
                                 $_SESSION["preferredClientCity"] = $_POST["preferredCity"];
                                 echo $_SESSION["preferredClientCity"];
                              ?>                                
                     </div>
                     <div class="col-md-4 padding-top-10">
                              <label for="preferredIntake" class="control-label">Preferred Intake:</label>
                              <?php
                                 $_SESSION["preferredClientMonth"] = $_POST["preferredMonth"];
                                  $_SESSION["preferredClientYear"] = $_POST["preferredYear"];
                                 echo $_SESSION["preferredClientMonth"]."-".$_SESSION["preferredClientYear"];
                              ?>
                     </div>
                     <div class="col-md-4 padding-top-10">
                        <label for="preferredStream" class="control-label">Preferred Stream:</label>
                              <?php
                                 $_SESSION["preferredClientStream"] = $_POST["preferredStream"];
                                 echo $_SESSION["preferredClientStream"];
                              ?>                         
                     </div>
                  </div>
                     <div class="row">
                        <div class="col-md-12 padding-top-10">
                        <label class="control-label">Any Previous Visa Rejection:</label>
                              <?php
                                 $_SESSION["visa_rejection"] = $_POST["VisaRejection"];
                                 echo $_SESSION["visa_rejection"];
                              ?>
                       </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <div class= "container padding-top-10">
         <div class="panel panel-default">
            <div class="panel-heading">Educational Qualification</div>
            <div class="panel-body">
               <div class="table-responsive">
                                    <table id="education" class="table table-bordered table-condensed">
                     <tbody>
                        <tr>
                           <th> Level </th>
                           <th> Field/Subjects </th>
                           <th> Year of Passing </th>
                           <th> Percentage(%) </th>
                           <th> Backlog (if any) </th>
                           <th> Board/University </th>
                        </tr>
                        <?php
                           $levelOfEdu = array('Matric(10th)', '10+2', 'Graduation', 'Post-Graduation', 'Diploma', 'Any Other Qualification');
                           $x = array('fieldSubjects', 'yearOfPassing', 'percentage', 'backlog', 'Board');
                           $_SESSION['educationOfuser'] = $_POST['eduQual'];  
                            for ($row=0; $row < count($levelOfEdu); $row++) { 
                              echo "<tr>"."<th>".$levelOfEdu[$row];
                             for ($cell=0; $cell < 5; $cell++) {
                               echo "<td><input readonly type='text' class='form-control table' name='eduQual[$row][".$x[$cell]."]'
                              value='".$_SESSION['educationOfuser'][$row][$x[$cell]]."'/>";
                             }
                            }
                        ?> 
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
      <div class= "container padding-top-10">
         <div class="panel panel-default">
            <div class="panel-heading">IELTS/TOEFL</div>
            <div class="panel-body">
               <div class="table-responsive">
                  <table class="table table-bordered table-condensed">
                     <tbody>
                        <tr>
                           <th> IELTS/TOEFL </th>
                           <th> Test Taken Date </th>
                           <th> Listening </th>
                           <th> Reading </th>
                           <th> Writing </th>
                           <th> Speaking </th>
                           <th> Overall Band </th>
                        </tr>
                        <?php
                        $_SESSION['foreignTest'] = $_POST['ielts'];
                           $y = array('typeofexam', 'dateoftest', 'listening', 'reading', 'writing', 'speaking', 'overallBand');
                            for ($row=0; $row < 1; $row++) { 
                              echo "<tr>";
                             for ($cell=0; $cell < 7; $cell++) {
                               echo "<td><input readonly type='text' class='form-control table' name='ielts[$cell][".$y[$cell]."]'
                               value='".$_SESSION['foreignTest'][$cell][$y[$cell]]."'/>";
                             }
                            }
                        ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
      <div class= "container padding-top-10">
         <div class="panel panel-default">
            <div class="panel-heading">Experience</div>
            <div class="panel-body">
               <div class="table-responsive">
                  <table class="table table-bordered table-condensed">
                     <tbody>
                        <tr>
                           <th> Name of Employer </th>
                           <th> Address of Employer with Phone No. </th>
                           <th> Your Designation </th>
                           <th> Salary (Monthly) </th>
                           <th> From </th>
                           <th> To </th>
                        </tr>
                         <?php
                        $_SESSION['userExperience'] = $_POST['experience'];
                           $z = array('employerName', 'employerAddress', 'designation', 'salary', 'from', 'to');
                            for ($row=0; $row < 1; $row++) { 
                              echo "<tr>";
                             for ($cell=0; $cell < 6; $cell++) {
                               echo "<td><input readonly type='text' class='form-control table' name='experience[$cell][".$z[$cell]."]''
                               value='".$_SESSION['userExperience'][$cell][$z[$cell]]."'/>";
                             }
                            }
                        ?>
                     </tbody>
                  </table>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <button type="submit" form="form1" value="Submit" class="btn btn-success submit">Confirm</button>
                  </div>
                  <div class="col-md-6">
                     <a class="btn btn-danger submit" href="http://localhost/form-php/StudentInformationForm.php">
                     Go Back
                     </a> 
                        
                     </div>
               </div>
            </div>
         </div>
      </div>

      <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
   </body>
</html>
