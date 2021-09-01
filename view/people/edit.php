<div class="content">
  <?php if(isset($message)){echo $message;}?>
  <div class="content">
  <h2>Sửa dân</h2>
  <form method="post" enctype="multipart/form-data">
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Tên:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" hidden name="peopleID" value="<?php echo $people->peopleID?>">
        <input type="text" class="form-control" name="name" value="<?php echo $people->name?>">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Tuổi:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="age" value="<?php echo $people->age?>">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Giới tính:</label>
      <div class="col-sm-10">
        <select id="" class="form-control" name="gender">
          <option selected>Chọn giới tính</option>
          <option value="1" <?php echo $people->gender ? 'selected':''?>>Nam</option>
          <option value="0" <?php echo $people->gender ? '':'selected'?>>Nữ</option>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Thành Phố:</label>
      <div class="col-sm-10">
        <select class="form-control" name="cityID" id="">
      
        <option selected>Chọn thành phố</option>
          <?php foreach ($cities as $city) {
            $selected = '';
            if($city->cityID == $people->cityID){$selected = 'selected';}
            echo "<option value=\"{$city->cityID}\" {$selected}>$city->cityName</option>";
          } ?>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Ảnh</label>
      <div class="col-sm-3">
        <input type="text" name="image" hidden value="<?php echo $people->image?>">
        <input type="file"  name="image" id="upload">
        <img src="./images/<?php echo $people->image?>" alt="" id="img_upload" width="200px">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-success" name="sbm">Sửa</button>
        <a href="index.php?view=people" class="btn btn-primary">Thoát</a>
      </div>
    </div>
  </form>
</div>
