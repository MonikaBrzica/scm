<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Nova soba</h1>
</div>
<form method="post" action="upis_u_bazu.php?tip=soba">
  <div class="form-group">
    <label for="broj">Broj sobe</label>
    <input type="text" class="form-control" id="broj" name="broj" placeholder="Upišite broj sobe">
  </div>
  <div class="form-group">
    <label for="dom">Dom</label>
    <select class="form-control" name="dom">
      <?php
        $sql = "SELECT * FROM domovi";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
      ?>
            <option value="<?php echo $row["id"]; ?>"><?php echo $row["naziv_doma"]; ?></option>
      <?php
          }
        }
        $conn->close();
      ?>
    </select>
  </div>
  <div class="form-group">
    <label for="kapacitet">Kapacitet</label>
    <input type="number" class="form-control" id="kapacitet" name="kapacitet" placeholder="Upišite kapacitet sobe">
  </div>
  <button type="submit" class="btn btn-success">Spremi</button>
</form>
