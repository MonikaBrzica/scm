<?php
  include_once 'inc/konekcija.php';
  include_once 'inc/sesija.php';
  $trenutna_stranica = "index";
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
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Obavijesti</h1>
            <?php if ($_SESSION["admin"]){ ?>
              <div class="mb-2 mb-md-0">
                <a href="dodaj.php?tip=obavijest" class="btn btn-sm btn-outline-secondary">
                  Nova obavijest
                </a>
              </div>
            <?php } ?>
          </div>
          <div class="row row-cols-1 row-cols-md-3">
            <?php
              $sql = "SELECT * FROM obavijesti ORDER BY id DESC";
              $result = mysqli_query($conn, $sql);

              if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                  $datum = date_create($row["datum"]);
            ?>
              <div class="col mb-4">
                <div class="card h-100">
                  <div class="card-header bg-success text-white">
                    <h5><strong><?php echo $row["naslov"]; ?></strong></h5>
                    <small class="text-white"><?php echo date_format($datum, 'd.m.Y'); ?></small>
                  </div>
                  <div class="card-body">
                    <p class="card-text"><?php echo $row["tekst"]; ?></p>
                  </div>
                </div>
              </div>
            <?php
                }
              } else {
                echo 'Trenutno nema novih obavijesti.';
              }
              $conn->close();
             ?>
          </div>
        </main>
      </div>
    </div>
    <?php include_once 'inc/podnozje.php';?>
  </body>
</html>
