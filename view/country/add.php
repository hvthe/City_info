<div class="content">
  <h2>Thêm Quốc Gia</h2>
  <form method="post" enctype="multipart/form-data">
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Tên quốc gia:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="countryName">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-3 col-form-label">Cờ quốc gia:</label>
      <div class="col-sm-9">
        <input type="text" class="" name="countryFlag" hidden value="empty.jpg">
        <input type="file" class="" name="countryFlag" id="upload">
        <img src="./images/empty.jpg" width="300px" alt="" id="img_upload">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-success" name="sbm">Thêm</button>
        <a href="index.php?view=country" class="btn btn-primary">Thoát</a>
      </div>
    </div>
  </form>
</div>