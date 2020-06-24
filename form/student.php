<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Novi student</h1>
</div>
<form method="post" action="upis_u_bazu.php?tip=student">
  <div class="form-group">
    <label for="ime">Ime i prezime</label>
    <input type="text" class="form-control" id="ime" name="ime" placeholder="Upišite ime i prezime studenta">
  </div>
  <div class="form-group">
    <label for="email">E-Mail adresa</label>
    <input type="text" class="form-control" id="email" name="email" placeholder="Upišite E-Mail adresu studenta">
  </div>
  <div class="form-group">
    <label for="lozinka">Lozinka</label>
    <input type="password" class="form-control" id="lozinka" name="lozinka" placeholder="Upišite lozinku studenta">
  </div>
  <button type="submit" class="btn btn-success">Spremi</button>
</form>
