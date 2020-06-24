<?php
  include_once 'inc/konekcija.php';
  session_start();

  $korisnicko_ime = $_POST["korisnicko_ime"];
  $lozinka        = $_POST["lozinka"];

  $sql = "SELECT * FROM korisnici WHERE email = '$korisnicko_ime' AND password = '$lozinka'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $_SESSION["logged"] = true;
      $_SESSION["id"] = $row["id"];
      $_SESSION["type"] = $row["type"];
      if($_SESSION["type"] == 1){
        $_SESSION["admin"] = true;
      }else {
        $_SESSION["admin"] = false;
      }
      $_SESSION["email"] = $row["email"];
      $_SESSION["name"] = $row["name"];
      $_SESSION["password"] = $row["password"];
    }
    header("Location: index.php");
  } else {
    header("Location: prijava.php?login=error");
  }

  $conn->close();
 ?>
