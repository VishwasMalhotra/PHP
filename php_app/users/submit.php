<?php
session_name('user_form');
include('../shared/header.php');
include('../functions/access_restricted.php');
include('../functions/storing_session_variables.php');
no_access_to_form();
$session_variables = array(
    'firstname' => 'firstName',
    'lastname' => 'lastName',
    'addressOne' => 'address1',
    'addressTwo' => 'address2',
    'address_city' => 'city',
    'address_state' => 'state',
    'address_zipcode' => 'zipcode',
    'contact_email' => 'email',
    'contact_phone' => 'phone',
    'birthDate' => 'dateofbirthdate',
    'birthMonth' => 'dateofbirthmonth',
    'birthYear' => 'dateofbirthyear',
    'relationshipStatus' => 'maritalStatus',
    'preferredClientCity' => 'preferredCity',
    'preferredClientMonth' => 'preferredMonth',
    'preferredClientYear' => 'preferredYear',
    'preferredClientStream' => 'preferredStream',
    'visa_rejection' => 'VisaRejection'
);
store_in_session($session_variables);
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title> Confirmation Page </title>
   </head>
   <body>
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
                          echo $_SESSION['firstname']." ".$_SESSION["lastname"];
                        ?> 
                     </div>
                  </div>
                  <div class="row padding-top-10">
                     <div class="col-md-12">
                        <label for="address1" class="control-label">Address:</label>
                        <?php
                          echo $_SESSION["addressOne"]." ".$_SESSION["addressTwo"];
                        ?>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-4 padding-top-10">
                        <label for="city" class="control-label">City:</label>
                        <?php
                          echo $_SESSION["address_city"];
                        ?>
                     </div>
                     <div class="col-md-4 padding-top-10">
                        <label for="state" class="control-label">State / Region:</label>
                        <?php
                          echo $_SESSION["address_state"];
                        ?>
                     </div>
                     <div class="col-md-4 padding-top-10">
                        <label for="zipcode" class="control-label">Zipcode:</label>
                        <?php
                          echo $_SESSION["address_zipcode"];
                        ?>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-8 padding-top-10">
                        <label for="email" class="control-label">E-mail:</label>
                        <?php
                          echo $_SESSION["contact_email"];
                        ?>
                     </div>
                     <div class="col-md-4 padding-top-10">
                        <label for="phone" class="control-label">Phone No:</label>
                        <?php
                          echo $_SESSION["contact_phone"];
                        ?>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-8 padding-top-10">
                        <label class="control-label">Date of Birth:</label>
                        <?php
                          echo $_SESSION["birthDate"]."-".$_SESSION["birthMonth"]."-".$_SESSION["birthYear"];
                        ?> 
                     </div>
                     <div class="col-md-4 padding-top-10">
                        <label class="control-label">Marital Status:</label>
                        <?php
                          echo $_SESSION["relationshipStatus"];
                        ?>
                     </div>
                  </div>
                  <?php
                    if($_POST['maritalStatus'] == 'Married') {
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
                           echo $_SESSION["preferredClientCity"];
                        ?>                                
                     </div>
                     <div class="col-md-4 padding-top-10">
                        <label for="preferredIntake" class="control-label">Preferred Intake:</label>
                        <?php
                           echo $_SESSION["preferredClientMonth"]."-".$_SESSION["preferredClientYear"];
                        ?>
                     </div>
                     <div class="col-md-4 padding-top-10">
                        <label for="preferredStream" class="control-label">Preferred Stream:</label>
                        <?php
                           echo $_SESSION["preferredClientStream"];
                        ?>                         
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12 padding-top-10">
                        <label class="control-label">Any Previous Visa Rejection:</label>
                        <?php
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
                          session_education();
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
                          session_ielts();
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
                          session_experience();
                        ?>
                     </tbody>
                  </table>
               </div>
               <div class="row">
                  <div class="col-md-12">
                     <?php
                        upload_file();
                      ?>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <button type="submit" form="form1" name="submit" value="Submit" class="btn btn-success submit">Confirm</button>
                  </div>
                  <div class="col-md-6">
                     <a class="btn btn-danger submit" href="StudentInformationForm.php">
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
