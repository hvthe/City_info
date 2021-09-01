<div class="content">
  <h2>Thêm Thành Phố</h2>
  <form method="post" enctype="multipart/form-data">
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Tên:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="cityName">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" >Quốc gia:</label>
      <div class="col-sm-10">
        <select id="" class="form-control" name="countryID">
          <?php foreach($countries as $key => $country){
            echo "<option value=\"{$country->countryID}\">$country->countryName</option>";
          }?>
          
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Diện Tích:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="cityArea">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Dân số:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="cityPopulation">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">GDP:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="cityGdp">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Giới thiệu:</label>
      <div class="col-sm-10">
        <textarea name="cityIntro" class="form-control"></textarea>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-success" name="sbm">Thêm thành phố</button>
        <a href="index.php" class="btn btn-primary">Thoát</a>
      </div>
    </div>
  </form>
</div>