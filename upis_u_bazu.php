<?php
  include_once 'inc/konekcija.php';
  include_once 'inc/sesija.php';
  if(isset($_GET["tip"])){
    $tip = $_GET["tip"];
  }


  switch ($tip) {
    case "obavijest":
      $datum = date("Y.m.d");
      $naslov = $_POST["naslov"];
      $tekst = $_POST["tekst"];
      $sql = "INSERT INTO obavijesti (datum, naslov, tekst) VALUES ('$datum', '$naslov', '$tekst')";

      if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
      } else {
        echo "Spremanje obavijesti nije uspjelo.";
      }
      $conn->close();
      break;
    case "student":
      $vrsta_korisnika = 2;
      $ime = $_POST["ime"];
      $email = $_POST["email"];
      $lozinka = $_POST["lozinka"];
      $sql = "INSERT INTO korisnici (type, email, password, name) VALUES ($vrsta_korisnika, '$email', '$lozinka', '$ime')";

      if ($conn->query($sql) === TRUE) {
        header("Location: korisnici.php");
      } else {
        echo "Spremanje studenta nije uspjelo.";
      }
      $conn->close();
      break;
    case "administrator":
      $vrsta_korisnika = 1;
      $ime = $_POST["ime"];
      $email = $_POST["email"];
      $lozinka = $_POST["lozinka"];
      $sql = "INSERT INTO korisnici (type, email, password, name) VALUES ($vrsta_korisnika, '$email', '$lozinka', '$ime')";

      if ($conn->query($sql) === TRUE) {
        header("Location: korisnici.php");
      } else {
        echo "Spremanje administratora nije uspjelo.";
      }
      $conn->close();
      break;
    case "soba":
      $broj = $_POST["broj"];
      $dom = $_POST["dom"];
      $kapacitet = $_POST["kapacitet"];
      $sql = "INSERT INTO sobe (broj_sobe, kapacitet, id_doma) VALUES ($broj, $kapacitet, $dom)";

      if ($conn->query($sql) === TRUE) {
        header("Location: rezervacije.php");
      } else {
        echo "Spremanje sobe nije uspjelo.";
      }
      $conn->close();
      break;
    case "jelovnik":
      $datum = date($_POST["datum"]);
      $predjelo = $_POST["predjelo"];
      $glavno_jelo = $_POST["glavno_jelo"];
      $desert = $_POST["desert"];
      $sql = "INSERT INTO menza (datum, predjelo, glavno_jelo, desert) VALUES ('$datum', '$predjelo', '$glavno_jelo', '$desert')";

      if ($conn->query($sql) === TRUE) {
        header("Location: menza.php");
      } else {
        echo "Spremanje jelovnika nije uspjelo.";
      }
      $conn->close();
      break;
    case "rezervacija":
      $id_korisnika = $_GET["id_korisnika"];
      $id_sobe = $_GET["id_sobe"];
      $sql = "INSERT INTO rezervacije (id_korisnika, id_sobe) VALUES ($id_korisnika, $id_sobe)";

      if ($conn->query($sql) === TRUE) {
        header("Location: rezervacije.php");
      } else {
        echo "Rezervacija sobe nije uspjela.";
      }
      $conn->close();
      break;
    case "otkazi_rezervaciju":
      $id_korisnika = $_GET["id_korisnika"];
      $sql = "DELETE FROM rezervacije WHERE id_korisnika = $id_korisnika";

      if ($conn->query($sql) === TRUE) {
        header("Location: rezervacije.php");
      } else {
        echo "Otkazivanje rezervacije trenutno nije moguce.";
      }
      $conn->close();
      break;
    case "problem":
      $problem = $_POST["problem"];
      $id_sobe = $_GET["id_sobe"];
      $id_doma = $_GET["id_doma"];
      $sql = "INSERT INTO problemi (id_sobe, id_doma, id_korisnika, problem, problem_rijesen) VALUES ($id_sobe, $id_doma, {$_SESSION["id"]}, '$problem', 0)";

      if ($conn->query($sql) === TRUE) {
        header("Location: poteskoce.php");
      } else {
        echo "Prijava problema nije uspjela.";
      }
      $conn->close();
      break;
    case "rijesi_problem":
      $id_problema = $_GET["id_problema"];
      $sql = "UPDATE problemi SET problem_rijesen = 1 WHERE id = $id_problema";

      if ($conn->query($sql) === TRUE) {
        header("Location: poteskoce.php");
      } else {
        echo "Rješenje problema nije moguće.";
      }
      $conn->close();
      break;
    case "izbrisi_korisnika":
      $id = $_GET["id"];
      $sql = "DELETE FROM korisnici WHERE id = $id";

      if ($conn->query($sql) === TRUE) {
        header("Location: korisnici.php");
      } else {
        echo "Brisanje korisnika trenutno nije moguće.";
      }
      $conn->close();
      break;
    case "uredi_korisnika":
      $id = $_GET["id"];
      $ime = $_POST["ime"];
      $email = $_POST["email"];
      $lozinka = $_POST["lozinka"];
      $sql = "UPDATE korisnici SET email = '$email', password = '$lozinka', name = '$ime' WHERE id = $id";

      if ($conn->query($sql) === TRUE) {
        if(isset($_GET["url"]) && $_GET["url"] != ""){
          $url = $_GET["url"];
        }else{
          $url = "korisnici.php";
        }
        header("Location: ".$url);
      } else {
        echo "Spremanje studenta nije uspjelo.";
      }
      $conn->close();
      break;
    default:
      echo 'Spremanje podataka nije moguce. Pokusajte ponovo.';
  }
?>
