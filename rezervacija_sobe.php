<?php
  include_once 'inc/konekcija.php';
  include_once 'inc/sesija.php';
  $trenutna_stranica = "rezervacije";
  if(isset($_GET["id_sobe"])){
    $id = $_GET["id_sobe"];
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include_once 'inc/zaglavlje.php';?>
    <title>SCM - Rezervacija sobe</title>
  </head>
  <body>
    <?php include_once 'inc/navigacija.php';?>
    <div class="container-fluid">
      <div class="row">
        <?php include_once 'inc/izbornik.php';?>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Rezervacija sobe</h1>
          </div>
          <?php
            $sql = "SELECT * FROM sobe JOIN domovi ON domovi.id = id_doma  WHERE sobe.id = $id";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
                $broj_sobe = $row["broj_sobe"];
                $dom = $row["naziv_doma"];
                $kapacitet = $row["kapacitet"];
              }
            }
          ?>
            <div class="card">
              <div class="card-header bg-success text-white">
                <h5><strong>Podatci o sobi</strong></h5>
              </div>
              <div class="card-header">
                <strong>Broj sobe</strong>
              </div>
              <div class="card-body">
                <?php echo $broj_sobe; ?>
              </div>
              <div class="card-header">
                <strong>Dom</strong>
              </div>
              <div class="card-body">
                <?php echo $dom; ?>
              </div>
              <div class="card-header">
                <strong>Broj kreveta</strong>
              </div>
              <div class="card-body">
                <?php echo $kapacitet; ?>
              </div>
              <div class="card-header bg-success text-white">
                <h5><strong>Podatci o popunjenosti sobe</strong></h5>
              </div>
              <div class="card-header">
                <strong>Broj trenutnih rezervacija sobe</strong>
              </div>
              <div class="card-body">
                <?php
                  $sql = "SELECT COUNT(*) as popunjenost FROM rezervacije WHERE id_sobe = $id";
                  $result = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                      echo $row["popunjenost"];
                    }
                  }
                ?>
              </div>
              <div class="card-header">
                <strong>Rezervirali</strong>
              </div>
              <div class="card-body">
                <?php
                  $sql = "SELECT * FROM rezervacije JOIN korisnici ON korisnici.id = id_korisnika  WHERE id_sobe = $id";
                  $result = mysqli_query($conn, $sql);

                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                      echo $row["name"]."<br>";
                    }
                  }
                ?>
              </div>
              <div class="card-header">
                <strong>Želiš rezervirati?</strong>
              </div>
              <div class="card-body">
                <a href="upis_u_bazu.php?tip=rezervacija&id_korisnika=<?php echo $_SESSION["id"]; ?>&id_sobe=<?php echo $id; ?>" class="btn btn-success" name="button">Rezerviraj</a>
              </div>
            </div>
        </main>
      </div>
    </div>
    <?php include_once 'inc/podnozje.php';?>
  </body>
</html>
