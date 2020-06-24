<?php
  include_once 'inc/konekcija.php';
  include_once 'inc/sesija.php';
  include_once 'provjera_rezervacije.php';
  $trenutna_stranica = "rezervacije";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include_once 'inc/zaglavlje.php';?>
    <title>SCM - Rezervacije</title>
  </head>
  <body>
    <?php include_once 'inc/navigacija.php';?>
    <div class="container-fluid">
      <div class="row">
        <?php include_once 'inc/izbornik.php';?>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Rezervacije</h1>
            <?php if ($_SESSION["admin"]){ ?>
              <div class="mb-2 mb-md-0">
                <a href="dodaj.php?tip=soba" class="btn btn-sm btn-outline-secondary">
                  Nova soba
                </a>
              </div>
            <?php } ?>
          </div>
          <?php if($_SESSION["rezervirana_soba"]){ ?>
            <div class="alert alert-danger" role="alert">
              Imate rezerviranu sobu. Rezervacija nove sobe nije moguća dok ne otkažete rezervaciju trenutno rezervirane sobe. <br>
              Rezervaciju možete otkazati klikom na gumb.<br><br>
              <a href="upis_u_bazu.php?tip=otkazi_rezervaciju&id_korisnika=<?php echo $_SESSION["id"]; ?>" class="btn btn-danger">Otkaži rezervaciju trenutne sobe</a>
            </div>
          <?php } ?>
          <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <?php
                $sql = "SELECT * FROM domovi";
                $result = mysqli_query($conn, $sql);
                $domovi = array();
                if (mysqli_num_rows($result) > 0) {
                  while($row = mysqli_fetch_assoc($result)) {
                    array_push($domovi, $row["id"]);
              ?>
                    <a class="nav-item nav-link <?php if($row["id"] == 1){echo "active";} ?>" id="dom_<?php echo $row["id"] ?>_tab" data-toggle="tab" href="#dom_<?php echo $row["id"] ?>" role="tab" aria-controls="dom_<?php echo $row["id"] ?>" aria-selected="true"><?php echo $row["naziv_doma"] ?></a>
              <?php
                  }
                }

              ?>
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <?php
              foreach ($domovi as &$value) {
            ?>
                <div class="tab-pane fade show <?php if($value == 1){echo "active";} ?>" id="dom_<?php echo $value; ?>" role="tabpanel" aria-labelledby="dom_<?php echo $value; ?>">
                  <br>
                  <div class="table-responsive">
                    <table class="table">
                      <thead class="bg-success text-white">
                        <tr>
                          <th>Broj sobe</th>
                          <th class="text-center">Kapacitet</th>
                          <th class="text-center">Popunjenost</th>
                          <?php if($_SESSION["admin"] != true){ ?>
                            <th></th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
            <?php
                        $sql = "SELECT * FROM sobe WHERE id_doma = $value";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                          while($row = mysqli_fetch_assoc($result)) {
                            $sql2 = "SELECT COUNT(*) as popunjenost FROM rezervacije WHERE id_sobe = {$row["id"]}";
                            $result2 = mysqli_query($conn, $sql2);
                            if (mysqli_num_rows($result2) > 0) {
                              while($row2 = mysqli_fetch_assoc($result2)) {
                                $popunjenost = $row2["popunjenost"];
                              }
                            }
            ?>
                            <tr>
                              <td><?php echo $row["broj_sobe"]; ?></td>
                              <td class="text-center"><?php echo $row["kapacitet"]; ?></td>
                              <td class="text-center"><?php echo $popunjenost; ?> / <?php echo $row["kapacitet"]; ?></td>
                              <?php if($_SESSION["admin"] != true){ ?>
                                <td class="text-right">
                                  <?php
                                    if($popunjenost < $row["kapacitet"] && $_SESSION["rezervirana_soba"] == false) {
                                  ?>
                                      <a class="btn btn-success" href="rezervacija_sobe.php?id_sobe=<?php echo $row["id"] ?>">Rezerviraj</a>
                                  <?php
                                    } elseif($popunjenost < $row["kapacitet"] && $_SESSION["rezervirana_soba"] == true) {
                                  ?>
                                      <a class="btn btn-danger disabled" href="#">Onemogućeno</a>
                                  <?php
                                    } elseif($popunjenost == $row["kapacitet"]) {
                                  ?>
                                      <a class="btn btn-danger disabled" href="#">Popunjeno</a>
                                  <?php
                                    }
                                  ?>
                                </td>
                              <?php } ?>
                            </tr>
            <?php
                          }
                        }
            ?>
                      </tbody>
                    </table>
                  </div>
                </div>
            <?php
              }
            ?>
          </div>
        </main>
      </div>
    </div>
    <?php include_once 'inc/podnozje.php';?>
  </body>
</html>
