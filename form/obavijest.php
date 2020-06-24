<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Nova obavijest</h1>
</div>
<form method="post" action="upis_u_bazu.php?tip=obavijest">
  <div class="form-group">
    <label for="naslov">Naslov</label>
    <input type="text" class="form-control" id="naslov" name="naslov" placeholder="Upišite naslov">
  </div>
  <div class="form-group">
    <label for="tekst">Tekst</label>
    <textarea class="form-control" name="tekst" id="tekst" rows="8" cols="80" placeholder="Upišite tekst"></textarea>
  </div>
  <button type="submit" class="btn btn-success">Spremi</button>
</form>
