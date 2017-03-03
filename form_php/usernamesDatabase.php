<?php
 include("studentInfoConfig.php");
      $term = $_GET['term'];
      $sql = "SELECT name FROM users WHERE name LIKE '$term%'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
         while( $row = $result->fetch_assoc() ) {
         $json[] = $row["name"];
}
echo json_encode( $json);
   }
?>

