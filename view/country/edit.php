<div class="content">
  <?php if(isset($message1)){echo $message1;}?>
  <h2>Sửa thông tin Quốc Gia</h2>
  <form method="post" action="" enctype="multipart/form-data">
    <div class="form-group row">
      <label class="col-sm-3 col-form-label">Tên quốc gia:</label>
      <div class="col-sm-9">
        <input type="number" class="form-control" hidden name="countryID" value="<?php echo $country->countryID?>">
        <input type="text" class="form-control" name="countryName" value="<?php echo $country->countryName?>">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-3 col-form-label">Cờ quốc gia:</label>
      <div class="col-sm-9">
        <input type="file" id="upload"  name="countryFlag" >
        <input type="text" name="countryFlag" hidden value="<?php echo $country->countryFlag?>">
        <img src="./images/<?php echo $country->countryFlag?>" width="300px" id="img_upload" alt="">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-9">
        <button type="submit" class="btn btn-warning" name="sbm">Lưu</button>
        <a href="index.php?view=country" class="btn btn-primary">Thoát</a>
      </div>
    </div>
  </form>
</div>