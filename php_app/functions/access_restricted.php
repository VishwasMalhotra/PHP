<?php
function no_access_to_form(){
      if (!isset($_POST['submit'])) {
            header("Location: ../restricted_messages/noform.php");
            exit();   
      }
}     
?>