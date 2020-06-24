<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Novi dnevni meni</h1>
</div>
<form method="post" action="upis_u_bazu.php?tip=jelovnik">
  <div class="form-group">
    <label for="datum">Datum</label>
    <input type="date" class="form-control" id="datum" name="datum" placeholder="Odaberite datum">
  </div>
  <div class="form-group">
    <label for="predjelo">Predjelo</label>
    <input type="text" class="form-control" id="predjelo" name="predjelo" placeholder="Upišite predjelo">
  </div>
  <div class="form-group">
    <label for="glavno_jelo">Glavno jelo</label>
    <input type="text" class="form-control" id="glavno_jelo" name="glavno_jelo" placeholder="Upišite glavno jelo">
  </div>
  <div class="form-group">
    <label for="desert">Desert</label>
    <input type="text" class="form-control" id="desert" name="desert" placeholder="Upišite desert">
  </div>
  <button type="submit" class="btn btn-success">Spremi</button>
</form>
