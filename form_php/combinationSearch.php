<?php
 include("studentInfoConfig.php");
 session_start();
 if(!isset($_SESSION["login_username"])) 
{
header('Location: login.php?redirect=combinationSearch.php');
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title> Combination Search </title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="css/bootstrap.min.css" rel="stylesheet" />
      <link href="css/basic-template.css" rel="stylesheet" />
      <link rel="stylesheet" type="text/css" href="stylesheet.css" />
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
     <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      <script src="autocompleteSearch.js"></script>
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

   </head>
   <body>
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
      <form id="form1" action="combinationSearch.php" method="GET">
      <div class= "container padding-top-10">
         <div class="panel panel-default">
            <div class="panel-heading">Search Form</div>
            <div class="panel-body">
                  <label for="firstName" class="control-label">Name:</label>
                  <div class="row">
                     <div class="col-md-12 padding-top-10">
                     <input type="text" id="searchName" class="form-control" name="name" placeholder="Name to search" />                      
                     </div>
                  </div>

                  <div class="row">
                     <div class="col-md-6 padding-top-10">
                        <label for="email" class="control-label">E-mail:</label>
                        <input type="text" class="form-control" name="email" placeholder="E-mail Address to search" />
                     </div>
                     <div class="col-md-6 padding-top-10">
                        <label for="phone" class="control-label">Phone No:</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Contact Number to search" />
                     </div>
                  </div>

                  
                  <label for="address" class="control-label padding-top-10">Address:</label>
                  <div class="row padding-top-10">
                     <div class="col-md-12">
                        <input type="text" class="form-control" name="address" placeholder="Address to search" />
                     </div>
                  </div>
                  <div class="row padding-top-10">
                     <div class="col-md-6 padding-top-10">
                        <label for="state" class="control-label">State(Auto-Generated):</label>
                     	<select name="state">
							<?php 
								$sql="select distinct state from address";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
								echo "<option value='".$row["state"]."'>".$row["state"]."</option>";
									}
								}
							?>         		
                     	</select>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-4">
                        <div class="row">
                           <div class="col-md-12">
                              <label class="control-label">Marital Status:</label>
                           </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                              <label for="single">
                                 <input type="checkbox" name="maritalStatus[]" id="single" value="Single" />
                                 Single
                              </label>
                          </div>
                          <div class="col-md-6">
                             <label for="married">
                                <input type="checkbox" name="maritalStatus[]" id="married" value="Married" />
                                 Married
                              </label>
                          </div>
                       </div>
                     </div>
                  </div>
                  <center>
                  	
                  <div class="row padding-top-10">
                  	<div class="col-md-12">
                  		
               <button type="submit" form="form1" value="Submit" name="submit" class="btn btn-success ">Search</button>
                  	</div>
                  </div>
                  </center>
               </div>
               </div>
               </div>
   </form> 
         <?php 
         if ($_GET != NULL) {
         
      ?>  	
      <?php

        $name = $_GET['name'];
        if($name!=null){
        $nameSearch="and name like '%".$name."%'";
        } else {
          $nameSearch = NULL;
        }
        $email = $_GET['email'];
        if ($email!=null) {
        $emailSearch = "and email like '%".$email."%'";
        } else {
          $emailSearch = NULL;
        }

        $phoneNumber = $_GET['phone'];
        if ($phoneNumber!=null) {
        $phoneNumberSearch = "and phoneNumber like '%".$phoneNumber."%'";
        } else {
          $phoneNumberSearch = NULL;
        }

        $address = $_GET['address'];
        if ($address!=null) {
        $addressSearch = "and detailedAddress like '%".$address."%'";
        } else {
          $addressSearch = NULL;
        }

        $state = $_GET['state'];
        if ($state!=null) {
        $stateSearch = "state like '%".$state."%'";
        } else {
          $stateSearch = NULL;
        }        

        if(isset($_GET['maritalStatus'])) {
          if (count($_GET['maritalStatus']) == 1) {
          foreach($_GET['maritalStatus'] as $selected){
              $maritalStatusSearch = "and marritalStatus like '%".$selected."%'";
              
            }
          }
          if (count($_GET['maritalStatus']) == 2) {
            $maritalStatusSearch = "and marritalStatus like '%Single%' or marritalStatus like '%Married%' ";
          }
        } else {
         $maritalStatusSearch = NULL;
        }
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
               $sql = "SELECT * FROM users JOIN address ON users.id = address.users_id JOIN maritalinfo ON users.id = maritalinfo.users_id WHERE $stateSearch $nameSearch $emailSearch $phoneNumberSearch $addressSearch $maritalStatusSearch";
                       $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
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
                  else {
                     // echo 'No Information Found';
                ?>
                        <tr>
                       <td> 
                       <h4>No information Found</h4> </td>
                       <td></td>
                       <td></td>
                       <td></td>
                        
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
      </div> 
      <?php 
        }
         
      ?> 
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
   </body>
</html>
