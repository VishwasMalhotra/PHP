<?php
session_start();
function echo_session_variable($key) {
   if (isset($_SESSION[$key]))
 {
   echo $_SESSION[$key];
 }
}

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title> Student Information Form </title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="css/bootstrap.min.css" rel="stylesheet" />
      <link href="css/basic-template.css" rel="stylesheet" />
      <link rel="stylesheet" type="text/css" href="stylesheet.css" />
      <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      <script src="tableAddRow.js"></script>
      <script src="unsetjquery.js"></script>

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
      <div class="container bread">
         <ul class="breadcrumb">
            <li><a href="index.html"> Home </a></li>
            <li class="active"> Student Information Form </li>
         </ul>
      </div>   
      <form id="form1" action="submit.php" method="POST" enctype="multipart/form-data">
      <div class= "container padding-top-10">
         <div class="panel panel-default">
            <div class="panel-heading">Student Information Form</div>
            <div class="panel-body">
                  <label for="firstName" class="control-label">Name:</label>
                  <div class="row">
                     <div class="col-md-6 padding-top-10">
                     <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First" value="<?php echo_session_variable('firstname'); ?>" required/>                      
                     </div>
                     <div class="col-md-6 padding-top-10">
                        <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last" value="<?php echo_session_variable('lastname'); ?>" required/>
                     </div>
                  </div>
                  <label for="address1" class="control-label padding-top-10">Address:</label>
                  <div class="row padding-top-10">
                     <div class="col-md-12">
                        <input type="text" class="form-control" id="address1" name="address1" placeholder="Address Line 1" value="<?php echo_session_variable('addressOne'); ?>" required/>
                     </div>
                  </div>
                  <div class="row padding-top-10">
                     <div class="col-md-12">
                        <input type="text" class="form-control" id="address2" name="address2" placeholder="Address Line 2" value="<?php echo_session_variable('addressTwo'); ?>"/>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6 padding-top-10">
                        <label for="city" class="control-label">City:</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="Your City" value="<?php echo_session_variable('address_city'); ?>" required/>
                     </div>
                     <div class="col-md-2 padding-top-10">
                        <label for="state" class="control-label">State / Region:</label>
                        <input type="text" class="form-control" name="state" placeholder="Your State / Region" value="<?php echo_session_variable('address_state'); ?>" required/>
                     </div>
                     <div class="col-md-4 padding-top-10">
                        <label for="zipcode" class="control-label">Zipcode:</label>
                        <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Your Zipcode" value="<?php echo_session_variable('address_zipcode'); ?>" required/>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6 padding-top-10">
                        <label for="email" class="control-label">E-mail:</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Your E-mail Address" value="<?php echo_session_variable('contact_email'); ?>" required/>
                     </div>
                     <div class="col-md-6 padding-top-10">
                        <label for="phone" class="control-label">Phone No:</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Your Contact Number" value="<?php echo_session_variable('contact_phone'); ?>" required/>
                     </div>
                  </div>
                  <div class="row padding-top-10">
                     <div class="col-md-12">
                        <label class="control-label">Date of Birth:</label>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-8">
                        <div class="col-md-2 padding-top-10">
                           <label class="control-label">Date:</label>
                           <select  name="dateofbirthdate">
                           <?php
                              if ($_SESSION["birthDate"] != NULL) {
                                 for ($i=1; $i < 32 ; $i++) {
                                    if ($_SESSION["birthDate"] == $i) { 
                                       echo "<option value='$i' selected>"."$i"."</option>";
                                    } else {
                                       echo "<option value='$i'>"."$i"."</option>";
                                    }
                                 }
                                    echo "<option value='' disabled>DD</option>";
                              } else {
                                 for ($i=1; $i < 32 ; $i++) { 
                                    echo "<option value='$i'>"."$i"."</option>";
                                 }
                                 echo "<option value='' selected disabled>DD</option>";
                              }
                           ?>                           
                           </select>
                        </div>
                        <div class="col-md-2 padding-top-10">
                           <label class="control-label">Month:</label>
                           <select name="dateofbirthmonth" >
                              <?php 
                                 $months = array('','January', 'Febuary', 'March', 'April' , 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
                              if ($_SESSION["birthMonth"] != NULL) {
                                 for ($i=1; $i < count($months); $i++) {
                                    if ($_SESSION["birthMonth"] == $i) { 
                                       echo "<option value='$i' selected>"."$months[$i]"."</option>";
                                    } else {
                                       echo "<option value='$i'>"."$months[$i]"."</option>";
                                    }
                                 }
                                    echo "<option value='' disabled>MM</option>";
                              } else {
                                 for ($i=1; $i < count($months); $i++) { 
                                    echo "<option value='$i'>"."$months[$i]"."</option>";
                                 }
                                 echo "<option value='' selected disabled>MM</option>";
                              }
                               ?>
                           </select>
                        </div>
                        <div class="col-md-2 padding-top-10">
                           <label class="control-label">Year:</label>
                           <select name="dateofbirthyear" >
                           <?php
                              if ($_SESSION["birthYear"] != NULL) {
                                 for ($i=2006; $i > 1947 ; $i--) {
                                    if ($_SESSION["birthYear"] == $i) { 
                                       echo "<option value='$i' selected>"."$i"."</option>";
                                    } else {
                                       echo "<option value='$i'>"."$i"."</option>";
                                    }
                                 }
                                    echo "<option value='' disabled>YY</option>";
                              } else {
                                 for ($i=2006; $i > 1947 ; $i--) { 
                                    echo "<option value='$i'>"."$i"."</option>";
                                 }
                                 echo "<option value='' selected disabled>YY</option>";
                              }                          
                           ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="row">
                           <div class="col-md-12">
                              <label class="control-label">Marital Status:</label>
                           </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                              <label for="single">
                                 <input type="radio" name="maritalStatus" id="single" value="Single" checked />
                                 Single
                              </label>
                          </div>
                          <div class="col-md-6">
                             <label for="married">
                                <input type="radio" name="maritalStatus" id="married" value="Married" />
                                 Married
                              </label>
                          </div>
                       </div>
                     </div>
                  </div>
                  <label for="spousefirstName" class="control-label padding-top-10">Spouse Name(if married):</label>
                  <div class="row">
                     <div class="col-md-6 padding-top-10">
                        <input type="text" class="form-control" id="spousefirstName" name="spousefirstName" placeholder="First"  value="<?php echo_session_variable('spouseFirstName'); ?>"/>
                     </div>
                     <div class="col-md-6 padding-top-10">
                        <input type="text" class="form-control" name="spouselastName" id="spouselastName" placeholder="Last" value="<?php echo_session_variable('spouseLastName'); ?>"/>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-4 padding-top-10">
                        <label for="DOM" class="control-label">Date of Marriage:</label>
                        <input type="text" class="form-control" id="DOM" name="DOM" placeholder="DD / MM / YYY" value="<?php echo_session_variable('dateofMarriage'); ?>" />
                     </div>
                     <div class="col-md-4 padding-top-10">
                        <label for="spouseJob" class="control-label">Spouse Occupation:</label>
                        <input type="text" class="form-control" id="spouseJob" name="spouseJob" placeholder="Spouse Occupation"  value="<?php echo_session_variable('spouseOccupation'); ?>"/>
                     </div>
                     <div class="col-md-4 padding-top-10">
                        <label for="spouseQualification" class="control-label">Spouse Educational Qualification:</label>
                        <select id="educationQualification" name="educationQualification">
                           <option value="Matriculate(10th Pass)">Matriculate(10th Pass)</option>
                           <option value="Intermediate(12th Pass)">Intermediate(12th Pass)</option>
                           <option value="Graduate">Graduate</option>
                           <option value="Post-Graduate">Post-Graduate</option>
                           <option value="Diploma Holder">Diploma Holder</option>
                           <option value="P.H.D.">P.H.D.</option>
                        </select>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-4 padding-top-10">
                       <div class="row">
                           <div class="col-md-12">
                              <label for="preferredCity" class="control-label">Preferred City/Country:</label>
                           </div>
                           <div class="col-md-12 padding-top-10">
                              <input type="text" class="form-control" id="preferredCity" name="preferredCity" placeholder="City / Country" value="<?php echo_session_variable('preferredClientCity'); ?>"  required/>
                           </div>
                       </div>
                     </div>
                     <div class="col-md-4 padding-top-10">
                       <div class="row">
                           <div class="col-md-12">
                              <label for="preferredIntake" class="control-label">Preferred Intake:</label>
                           </div>
                           <div class="col-md-4 padding-top-10">
                           <select name="preferredMonth" required>
                              <?php 
                              if ($_SESSION["preferredClientMonth"] != NULL) {
                                 for ($i=1; $i < count($months); $i++) {
                                    if ($_SESSION["preferredClientMonth"] == $i) { 
                                       echo "<option value='$i' selected>"."$months[$i]"."</option>";
                                    } else {
                                       echo "<option value='$i'>"."$months[$i]"."</option>";
                                    }
                                 }
                                    echo "<option value='' disabled>MM</option>";
                                    } else {
                                       for ($i=1; $i < count($months); $i++) { 
                                          echo "<option value='$i'>"."$months[$i]"."</option>";
                                       }
                                       echo "<option value='' selected disabled>MM</option>";
                                    }                              
                               ?>                              
                          </select>                           
                           </div>
                           <div class="col-md-4 padding-top-10">
                           <select name="preferredYear" >
                              <option value="" selected disabled/>YY</option>
                           <?php
                              if ($_SESSION["preferredClientYear"]) {
                                 for ($i=2018; $i <= 2026 ; $i++) {
                                    if ($_SESSION["preferredClientYear"] == $i) { 
                                       echo "<option value='$i' selected>"."$i"."</option>";
                                    } else {
                                       echo "<option value='$i'>"."$i"."</option>";
                                    }
                                 }
                                    echo "<option value='' disabled>YY</option>";
                              } else {
                                 for ($i=2018; $i <= 2026 ; $i++) { 
                                    echo "<option value='$i'>"."$i"."</option>";
                                 }
                                 echo "<option value='' selected disabled>YY</option>";
                              }
                           ?> 
                           </select>                              
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4 padding-top-10">
                        <label for="preferredStream" class="control-label">Preferred Stream:</label>
                        <input type="text" class="form-control" id="preferredStream" name="preferredStream" placeholder="IT, Business, etc." value="<?php echo_session_variable('preferredClientStream'); ?>" required/>
                     </div>
                  </div>
                    <div class="col-md-4 padding-top-10">
                        <div class="row">
                           <div class="col-md-12">
                              <label class="control-label">Any Previous Visa Rejection:</label>
                           </div>
                        </div>
                        <div class="row padding-top-10">
                          <div class="col-md-6">
                              <label for="yes_rejection">
                                 <input type="radio" class="visa" name="VisaRejection" id="yes_rejection" value="Yes" />
                                 Yes
                              </label>
                          </div>
                          <div class="col-md-6">
                             <label for="no_rejection">
                                <input type="radio" class="visa" name="VisaRejection" id="no_rejection" value="No" checked />
                                 No
                              </label>
                          </div>
                       </div>
                     </div>
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
                            for ($row=0; $row < count($levelOfEdu); $row++) { 
                              echo "<tr>"."<th>".$levelOfEdu[$row];
                             for ($cell=0; $cell < 5; $cell++) {
                                 if (isset($_SESSION['educationOfuser'][$row][$x[$cell]]))
                                 {
                                    echo "<td><input type='text' class='form-control table' name='eduQual[$row][".$x[$cell]."]'
                               value='".$_SESSION['educationOfuser'][$row][$x[$cell]]."'/>";
                                 } else{
                               echo "<td><input type='text' class='form-control table' name='eduQual[$row][".$x[$cell]."]'/>";
                                 }
                             }
                            }
                        ?>
                     </tbody>
                  </table>
                     <!-- <a id="createRowQualification" class="btn btn-primary">+</a> -->
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
                           $y = array('typeofexam', 'dateoftest', 'listening', 'reading', 'writing', 'speaking', 'overallBand');
                            for ($row=0; $row < 1; $row++) { 
                              echo "<tr>";
                             for ($cell=0; $cell < 7; $cell++) {
                               if (isset($_SESSION['foreignTest'][$cell][$y[$cell]]))
                                 {                              
                               echo "<td><input type='text' class='form-control table' name='ielts[$cell][".$y[$cell]."]'
                               value='".$_SESSION['foreignTest'][$cell][$y[$cell]]."'/>";
                            } else{
                               echo "<td><input type='text' class='form-control table' name='ielts[$cell][".$y[$cell]."]'/>";
                            }
                             }
                            }
                        ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
     <div class= "container padding-top-10 ">
         <div class="panel panel-default">
            <div class="panel-heading">Experience (if any)</div>
            <div class="panel-body">
               <div class="table-responsive toappend">
                  <table id="myTable" class="table table-bordered table-condensed">
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
                           $z = array('employerName', 'employerAddress', 'designation', 'salary', 'from', 'to');
                            for ($row=0; $row < 1; $row++) { 
                              echo "<tr>";
                             for ($cell=0; $cell < 6; $cell++) {
                               if (isset($_SESSION['userExperience'][$cell][$z[$cell]]))
                                 {                              
                               echo "<td><input type='text' class='form-control table' name='experience[$cell][".$z[$cell]."]'' value='".$_SESSION['userExperience'][$cell][$z[$cell]]."'/>";
                             } else{
                               echo "<td><input type='text' class='form-control table' name='experience[$cell][".$z[$cell]."]'/>";                              
                             }
                          }
                           }
                        ?>
                     </tbody>
                  </table>
            </div>
            <?php 
               if (isset($_SESSION['fileToUpload'])) {
            ?>
      <div class="row padding-top-10 hidethis">
      <div class="col-md-4">
         <label> File selected: </label>
         <?php
         $pathString = $_SESSION['fileToUpload'];
         $cutpathString = substr($pathString, strpos($pathString, ".tmp") + 4);
         ?>
         <input type="text" readonly value="<?php echo $cutpathString ?>"> 
         <a id="clear" class="btn btn-danger">x</a>
      </div>
      </div>
      <?php
      } 
      else {
      ?>
      <div class="row padding-top-10">
      <div class="col-md-4">
         <label> Select file to upload: </label>
         <input type="file" name="fileToUpload" id="fileToUpload" accept="application/pdf"> <br/>
      </div>
      </div>

      <?php
      }
      ?>      
               <br/><button type="submit" form="form1" value="Submit" name="submit" class="btn btn-success submit">Submit</button>
         </div>
      </div> 
   </form>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
   </body>
</html>
