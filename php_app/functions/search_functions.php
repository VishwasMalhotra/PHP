<?php
   session_name('adminSession');
   session_start();

function restrict_search_form()
{
if(((!isset($_SESSION['facebookEmail']) && !isset($_SESSION['login_username']))) && !isset($_SESSION['cookie_var']))
{
header('Location: ../admin/login.php?redirect=search_form/combinationSearch.php');
}
if (isset($_SESSION['cookie_var'])) {
if (!isset($_COOKIE["donotlogout"])) {
  header('Location: logout.php');
} 
}
}

function pre_populate_state()
{
include("../database_connection.php");
$sql="select distinct state from address";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo "<option value='".$row["state"]."'>".$row["state"]."</option>";
  }
}
}


?>