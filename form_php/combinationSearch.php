<?php
 include("studentInfoConfig.php");
 session_start();
if(!isset($_SESSION["login_username"]))
{
    header("Location: login.php");

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
      <form id="form1" action="resultCombination.php" method="POST">
      <div class= "container padding-top-10">
         <div class="panel panel-default">
            <div class="panel-heading">Search Form</div>
            <div class="panel-body">
                  <label for="firstName" class="control-label">Name:</label>
                  <div class="row">
                     <div class="col-md-12 padding-top-10">
                     <input type="text" class="form-control" name="name" placeholder="Name to search" />                      
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
                     <div class="col-md-6 padding-top-10">
                        <label class="control-label">Level:</label>
                     	<select name="level">
                              <?php 
                     			$x = array('Any','fieldSubjects', 'yearOfPassing', 'percentage', 'backlog', 'Board');
                                 for ($i=0; $i < count($x); $i++) { 
                                    echo "<option value='$i'>"."$x[$i]"."</option>";
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

    	 <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
   </body>
</html>
