<?php
  session_start();
  if (isset($_SESSION['id'])){
    header('Location:./sources/main.php');
  } else {
    header('Location:./sources/signIn.php');
  }
?>