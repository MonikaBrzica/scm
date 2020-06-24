<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "scm";

  $conn = mysqli_connect($servername, $username, $password, $dbname, "3308");
  mysqli_set_charset($conn, "utf8");

  if (!$conn) {
    die("Greška: " . mysqli_connect_error());
  }
?>
