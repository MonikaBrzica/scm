<?php
  include_once 'inc/konekcija.php';
  include_once 'inc/sesija.php';
  include_once 'provjera_rezervacije.php';
  $trenutna_stranica = "korisnici";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include_once 'inc/zaglavlje.php';?>
    <title>SCM - Korisnici</title>
  </head>
  <body>
    <?php include_once 'inc/navigacija.php';?>
    <div class="container-fluid">
      <div class="row">
        <?php include_once 'inc/izbornik.php';?>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Korisnici</h1>
            <?php if ($_SESSION["type"] == 1){ ?>
              <div class="mb-2 mb-md-0">
                <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="korisnici" data-toggle="dropdown">
                  Novi korisnik
                </button>
                <div class="dropdown-menu" aria-labelledby="korisnici">
                  <a class="dropdown-item" href="dodaj.php?tip=student">Student</a>
                  <a class="dropdown-item" href="dodaj.php?tip=administrator">Administrator</a>
                </div>
              </div>
            <?php } ?>
          </div>
          <div class="alert alert-danger" role="alert">
            Studenta nije moguće izbrisati ukoliko ima rezerviranu sobu. <br>
            Za uspješno brisanje, potrebno je najprije otkazati rezervaciju sobe.
          </div>
          <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="studenti_tab" data-toggle="tab" href="#studenti" role="tab" aria-controls="studenti" aria-selected="true">Studenti</a>
              <a class="nav-item nav-link" id="administratori_tab" data-toggle="tab" href="#administratori" role="tab" aria-controls="administratori" aria-selected="false">Administratori</a>
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="studenti" role="tabpanel" aria-labelledby="studenti">
              <br>
              <div class="table-responsive">
                <table class="table">
                  <thead class="bg-success text-white">
                    <tr>
                      <th>Ime i prezime</th>
                      <th>E-Mail</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $sql = "SELECT * FROM korisnici WHERE type = 2";
                      $result = mysqli_query($conn, $sql);

                      if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                    ?>
                          <tr>
                            <td><?php echo $row["name"]; ?></td>
                            <td><?php echo $row["email"]; ?></td>
                            <td class="text-right">
                              <a href="uredi_korisnika.php?id=<?php echo $row["id"]; ?>" class="btn btn-success">Uredi</a>
                              <?php
                                $sql = "SELECT * FROM rezervacije WHERE id_korisnika = {$row["id"]}";
                                $result2 = mysqli_query($conn, $sql);
                                $brisanje_nemoguce = "";
                                if (mysqli_num_rows($result2) > 0) {
                                  $brisanje_nemoguce = "disabled";
                                }
                              ?>
                              <a href="upis_u_bazu.php?tip=izbrisi_korisnika&id=<?php echo $row["id"]; ?>" class="btn btn-danger <?php echo $brisanje_nemoguce; ?>">Izbriši</a>
                            </td>
                          </tr>
                    <?php
                        }
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane fade" id="administratori" role="tabpanel" aria-labelledby="administratori">
              <br>
              <div class="table-responsive">
                <table class="table">
                  <thead class="bg-success text-white">
                    <tr>
                      <th>Ime i prezime</th>
                      <th>E-Mail</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $sql = "SELECT * FROM korisnici WHERE type = 1";
                      $result = mysqli_query($conn, $sql);

                      if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                    ?>
                          <tr>
                            <td><?php echo $row["name"]; ?></td>
                            <td><?php echo $row["email"]; ?></td>
                            <td class="text-right">
                              <a href="uredi_korisnika.php?id=<?php echo $row["id"]; ?>" class="btn btn-success">Uredi</a>
                              <a href="upis_u_bazu.php?tip=izbrisi_korisnika&id=<?php echo $row["id"]; ?>" class="btn btn-danger">Izbriši</a>
                            </td>
                          </tr>
                    <?php
                        }
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
    <?php include_once 'inc/podnozje.php';?>
  </body>
</html>
