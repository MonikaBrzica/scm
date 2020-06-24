<?php
  session_start();
  if($_SESSION["logged"] != true) {
    header("Location: prijava.php");
  }
?>
