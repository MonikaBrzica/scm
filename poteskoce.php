<?php
  include_once 'inc/konekcija.php';
  include_once 'inc/sesija.php';
  include_once 'provjera_rezervacije.php';
  $trenutna_stranica = "poteskoce";
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
            <h1 class="h2">Problemi</h1>
            <?php if($_SESSION["rezervirana_soba"]){ ?>
              <div class="mb-2 mb-md-0">
                <a href="dodaj.php?tip=problem" class="btn btn-sm btn-outline-secondary">
                  Prijavi problem
                </a>
              </div>
            <?php } ?>
          </div>
          <?php if($_SESSION["rezervirana_soba"] == false && $_SESSION["admin"] != true){ ?>
            <div class="alert alert-danger" role="alert">
              Nemate rezerviranu sobu. Prijava problema moguća je samo ako imate rezerviranu sobu.<br><br>
              <a href="rezervacije.php" class="btn btn-success">Rezerviraj sobu</a>
            </div>
          <?php } ?>
          <div class="table-responsive">
            <table class="table">
              <thead class="bg-success text-white">
                <tr>
                  <th>Soba</th>
                  <th>Dom</th>
                  <th>Opis problema</th>
                  <th>Riješeno?</th>
                  <?php if($_SESSION["admin"]){ ?>
                    <th></th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
                <?php
                  if($_SESSION["admin"]){
                    $sql = "SELECT problemi.*, broj_sobe, naziv_doma FROM problemi join sobe ON sobe.id = id_sobe JOIN domovi ON domovi.id = problemi.id_doma";
                  }else{
                    $sql = "SELECT problemi.*, broj_sobe, naziv_doma FROM problemi join sobe ON sobe.id = id_sobe JOIN domovi ON domovi.id = problemi.id_doma WHERE id_korisnika = {$_SESSION["id"]}";
                  }

                  $result = mysqli_query($conn, $sql);

                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                ?>
                      <tr>
                        <td><?php echo $row["broj_sobe"]; ?></td>
                        <td><?php echo $row["naziv_doma"]; ?></td>
                        <td><?php echo $row["problem"]; ?></td>
                        <td>
                          <?php
                            if($row["problem_rijesen"] == 0) {
                              echo '<strong class="text-danger">NE</strong>';
                            } else {
                              echo '<strong class="text-success">DA</strong>';
                            }
                         ?>
                        </td>
                        <?php if($_SESSION["admin"]){ ?>
                          <th class="text-right">
                            <?php if($row["problem_rijesen"] == 0) { ?>
                              <a class="btn btn-success" href="upis_u_bazu.php?tip=rijesi_problem&id_problema=<?php echo $row["id"]; ?>">Riješi</a>
                            <?php } else { ?>
                              <a class="btn btn-danger disabled" href="#">Riješeno</a>
                            <?php } ?>
                          </th>
                        <?php } ?>
                      </tr>
                <?php
                    }
                  }
                ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>
    <?php include_once 'inc/podnozje.php';?>
  </body>
</html>
