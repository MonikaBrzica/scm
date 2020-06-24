<?php
  $sql = "SELECT rezervacije.*, broj_sobe, naziv_doma, domovi.id as id_doma FROM rezervacije JOIN sobe ON sobe.id = id_sobe JOIN domovi ON domovi.id = sobe.id_doma WHERE id_korisnika = {$_SESSION["id"]}";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)){
      $id_sobe = $row["id_sobe"];
      $broj_sobe = $row["broj_sobe"];
      $id_doma = $row["id_doma"];
      $dom = $row["naziv_doma"];
    }
    $_SESSION["rezervirana_soba"] = true;
  } else {
    $_SESSION["rezervirana_soba"] = false;
  }
 ?>
