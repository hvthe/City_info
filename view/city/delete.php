
<div class="content">
  <h2>Xóa Thành Phố</h2>
  <p>Bạn có muốn xóa thành phố: <?php echo $city->cityName ?>?</p>
  <form method="post">
    <input type="text" class="form-control" hidden name="id" value="<?php echo $city->cityID ?>">
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-danger" name="sbm">Xóa</button>
        <a href="index.php" class="btn btn-primary">Thoát</a>
      </div>
    </div>
  </form>
</div>