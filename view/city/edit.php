<div class="content">
<?php if(isset($message)){echo "<div class=\"message alert alert-danger\">{$message}</div>";}?>
  
  <h2>Sửa thông tin thành phố</h2>
  <form method="post" enctype="multipart/form-data">
    <div class="form-group row">
      <label class="col-sm-3 col-form-label">Tên:</label>
      <div class="col-sm-9">
        <input type="number" class="form-control" hidden name="cityID" value="<?php echo $city->cityID?>">
        <input type="text" class="form-control" name="cityName" value="<?php echo $city->cityName?>">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-3 col-form-label">Quốc gia:</label>
      <div class="col-sm-9">
        <select name="countryID" id="" class="form-control">
          <?php 
          foreach($countries as $country){
            $active = '';
            if($country->countryID == $city->countryID){
              $active = 'selected';
            }
            echo "<option value=\"$country->countryID\" $active>$country->countryName</option>";
            }
            ?>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-3 col-form-label">Diện Tích: (Km2) </label>
      <div class="col-sm-9">
        <input type="number" class="form-control" name="cityArea" value="<?php echo $city->cityArea?>">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-3 col-form-label">Dân số: (Người) </label>
      <div class="col-sm-9">
        <input type="number" class="form-control" name="cityPopulation" value="<?php echo $city->cityPopulation?>">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-3 col-form-label">GDP: (tỉ USD) </label>
      <div class="col-sm-9">
        <input type="number" class="form-control" name="cityGdp" value="<?php echo $city->cityGdp?>">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-3 col-form-label">Giới thiệu:</label>
      <div class="col-sm-9">
        <textarea name="cityIntro" class="form-control">
          <?php echo $city->cityIntro?>
        </textarea>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-9">
        <button type="submit" class="btn btn-warning" name="sbm">Lưu</button>
        <a href="index.php?view=city&page=detail&id=<?php echo $city->cityID?>" class="btn btn-primary">Thoát</a>
      </div>
    </div>
  </form>
</div>