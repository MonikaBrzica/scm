<?php include_once 'provjera_rezervacije.php'; ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Opis problema</h1>
</div>
<form method="post" action="upis_u_bazu.php?tip=problem&id_sobe=<?php echo $id_sobe; ?>&id_doma=<?php echo $id_doma; ?>">
  <div class="form-group">
    <label for="broj">Broj sobe</label>
    <input type="text" class="form-control" id="broj" name="broj" value="<?php echo $broj_sobe; ?>" disabled>
  </div>
  <div class="form-group">
    <label for="dom">Dom</label>
    <input type="text" class="form-control" id="dom" name="dom" value="<?php echo $dom; ?>" disabled>
    </select>
  </div>
  <div class="form-group">
    <label for="problem">Opis problema</label>
    <textarea name="problem" class="form-control" rows="5"></textarea>
  </div>
  <button type="submit" class="btn btn-success">Prijavi</button>
</form>
