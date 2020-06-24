<?php
  include_once 'inc/konekcija.php';
  include_once 'inc/sesija.php';
  $trenutna_stranica = "";
  if(isset($_GET["tip"])){
    $tip = $_GET["tip"];
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include_once 'inc/zaglavlje.php';?>
    <title>SCM</title>
  </head>
  <body>
    <?php include_once 'inc/navigacija.php';?>
    <div class="container-fluid">
      <div class="row">
        <?php include_once 'inc/izbornik.php';?>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
          <?php
            switch ($tip) {
              case "obavijest":
                include_once 'form/obavijest.php';
                break;
              case "student":
                include_once 'form/student.php';
                break;
              case "administrator":
                include_once 'form/administrator.php';
                break;
              case "soba":
                include_once 'form/soba.php';
                break;
              case "jelovnik":
                include_once 'form/jelovnik.php';
                break;
              case "problem":
                include_once 'form/problem.php';
                break;
              default:
                echo 'Forma za upis podataka nije pronadena.';
            }
          ?>
        </main>
      </div>
    </div>
    <?php include_once 'inc/podnozje.php';?>
  </body>
</html>
