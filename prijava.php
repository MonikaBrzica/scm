<?php
  $login_err = isset($_GET["login"]) ? $_GET["login"] : '';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include_once 'inc/zaglavlje.php';?>
    <title>SCM - Prijava</title>
  </head>
  <body class="min-vh-100" style="background: url(img/scm.png) no-repeat fixed; background-size: cover;">
    <div class="container min-vh-100">
      <div class="row min-vh-100 justify-content-center align-items-center">
        <div class="col-md-4 col-lg-4 col-sm-10">
          <?php if($login_err == "error"){ ?>
            <div class="alert alert-danger" role="alert">
              Upisali ste pogrešno korisničko ime ili lozinku. Pokušajte ponovo.
            </div>
          <?php } ?>
          <form class="mb-3" method="post" action="provjera_korisnika.php">
            <div class="form-group">
              <label for="korisnicko_ime" class="text-white">Korisničko ime</label>
              <input type="email" class="form-control" id="korisnicko_ime" name="korisnicko_ime" placeholder="Korisničko ime">
            </div>
            <div class="form-group">
              <label for="lozinka" class="text-white">Lozinka</label>
              <input type="password" class="form-control" id="lozinka" name="lozinka" placeholder="Lozinka">
            </div>
            <button type="submit" class="btn btn-success">Prijavi se</button>
          </form>
      		<a class="text-white" id="oporavak" href="lozinka.php" >Zaboravili ste lozinku?</a>
        </div>
      </div>
    </div>


    <?php include_once 'inc/podnozje.php';?>
  </body>
</html>
