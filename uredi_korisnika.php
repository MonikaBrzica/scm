<?php
  include_once 'inc/konekcija.php';
  include_once 'inc/sesija.php';
  $trenutna_stranica = "korisnici";
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
            $id = $_GET["id"];
            if(isset($_GET["url"])){
              $url = $_GET["url"];
            }else{
              $url = "";
            }
            $sql = "SELECT * FROM korisnici WHERE id = $id";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
                $ime = $row["name"];
                $email = $row["email"];
                $lozinka = $row["password"];
              }
            }
          ?>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Uredi korisnika</h1>
          </div>
          <form method="post" action="upis_u_bazu.php?tip=uredi_korisnika&id=<?php echo $id; ?>&url=<?php echo $url; ?>">
            <div class="form-group">
              <label for="ime">Ime i prezime</label>
              <input type="text" class="form-control" id="ime" name="ime" value="<?php echo $ime; ?>">
            </div>
            <div class="form-group">
              <label for="email">E-Mail adresa</label>
              <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
              <label for="lozinka">Lozinka</label>
              <input type="password" class="form-control" id="lozinka" name="lozinka" value="<?php echo $lozinka; ?>">
            </div>
            <button type="submit" class="btn btn-success">Ažuriraj</button>
          </form>
        </main>
      </div>
    </div>
    <?php include_once 'inc/podnozje.php';?>
  </body>
</html>
