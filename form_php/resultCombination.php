<?php
 include("studentInfoConfig.php");
if (!isset($_POST['submit'])) {
  header("Location: combinationSearch.php");
}
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

      <?php

        $name = $_POST['name'];
        if($name!=null){
        $nameSearch="and name like '%".$name."%'";
        } else {
          $nameSearch = NULL;
        }
        $email = $_POST['email'];
        if ($email!=null) {
        $emailSearch = "and email like '%".$email."%'";
        } else {
          $emailSearch = NULL;
        }

        $phoneNumber = $_POST['phone'];
        if ($phoneNumber!=null) {
        $phoneNumberSearch = "and phoneNumber like '%".$phoneNumber."%'";
        } else {
          $phoneNumberSearch = NULL;
        }

        $address = $_POST['address'];
        if ($address!=null) {
        $addressSearch = "and detailedAddress like '%".$address."%'";
        } else {
          $addressSearch = NULL;
        }

        $state = $_POST['state'];
        if ($state!=null) {
        $stateSearch = "state like '%".$state."%'";
        } else {
          $stateSearch = NULL;
        }        

        if(isset($_POST['maritalStatus'])) {
          if (count($_POST['maritalStatus']) == 1) {
          foreach($_POST['maritalStatus'] as $selected){
              $maritalStatusSearch = "and marritalStatus like '%".$selected."%'";
              
            }
          }
          if (count($_POST['maritalStatus']) == 2) {
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
                ?>
                        
                     </tbody>
                  </table>
               </div>
            </div>
            </div>
         </div>
      </div>  
               <div class="row">
                  <div class="col-md-12">
                  <center>
                    
                       <a href="combinationSearch.php" style="width: 80%" class="btn btn-primary"><strong>Go back to the search form</strong></a>
                  </center>
                  </div>
               </div>

       <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
   </body>
</html>
