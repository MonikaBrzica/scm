<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="sidebar-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link <?php if($trenutna_stranica == "index") {echo "active";} ?>" href="index.php">Početna</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($trenutna_stranica == "rezervacije") {echo "active";} ?>" href="rezervacije.php">Rezervacije</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($trenutna_stranica == "poteskoce") {echo "active";} ?>" href="poteskoce.php">Poteškoće</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($trenutna_stranica == "menza") {echo "active";} ?>" href="menza.php">Menza</a>
      </li>
      <?php if ($_SESSION["admin"]){ ?>
        <li class="nav-item">
          <a class="nav-link <?php if($trenutna_stranica == "korisnici") {echo "active";} ?>" href="korisnici.php">Korisnici</a>
        </li>
      <?php } ?>
      <li class="nav-item">
        <a class="nav-link <?php if($trenutna_stranica == "moj_profil") {echo "active";} ?>" href="moj_profil.php">Moj profil</a>
      </li>
    </ul>
  </div>
</nav>
