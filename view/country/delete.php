
<div class="content">
  <h2>Xóa Thành Phố</h2>
  <p>Bạn có muốn xóa quốc gia: <?php echo $country->countryName ?>?</p>
  <form method="post">
    <input type="text" class="form-control" hidden name="countryID" value="<?php echo $country->countryID ?>">
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-danger" name="sbm">Xóa</button>
        <a href="index.php?view=country" class="btn btn-primary">Thoát</a>
      </div>
    </div>
  </form>
</div>