<?php
  include_once 'inc/konekcija.php';
  include_once 'inc/sesija.php';
  $trenutna_stranica = "moj_profil";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include_once 'inc/zaglavlje.php';?>
    <title>SCM - Moj profil</title>
  </head>
  <body>
    <?php include_once 'inc/navigacija.php';?>
    <div class="container-fluid">
      <div class="row">
        <?php include_once 'inc/izbornik.php';?>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Moj profil</h1>
          </div>
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="img/korisnik.png" class="card-img img-fluid" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <?php
                    $sql = "SELECT * FROM korisnici WHERE id = {$_SESSION["id"]}";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                      while($row = mysqli_fetch_assoc($result)) {
                        $ime = $row["name"];
                        $email = $row["email"];
                        $lozinka = $row["password"];
                      }
                    }
                  ?>
                  <h5 class="card-title"><?php echo $ime; ?></h5>
                  <p class="card-text">E-Mail: <?php echo $email; ?></p>
                  <p class="card-text">Lozinka: <?php echo $lozinka; ?></p>
                  <a class="btn btn-success btn-block" href="uredi_korisnika.php?id=<?php echo $_SESSION["id"]; ?>&url=moj_profil.php">Uredi podatke</a>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
    <?php include_once 'inc/podnozje.php';?>
  </body>
</html>
