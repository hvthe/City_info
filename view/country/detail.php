<div class="content border border-primary">
    <div class="header">
        <h2 class="heading">Thành Phố <?php echo $city->cityName?></h2>
        <a href="index.php" class="btn btn-success"> Danh sách thành phố</a>
    </div>
    <div>
        <p class="text-justify">Tên: <span><?php echo $city->cityName?></span></p>
        <p class="text-justify">Quốc gia: <span><?php echo $country->countryName?> </span> <img src="./view/images/<?php echo $country->countryFlag ?>" height = "50px" alt=""></p>
        <p class="text-justify">Diện Tích: <span><?php echo number_format($city->cityArea)?> Km2 </span></p>
        <p class="text-justify">Dân số: <span><?php echo number_format($city->cityPopulation)?> Người</span></p>
        <p class="text-justify">GDP: <span><?php echo $city->cityGdp?></span> tỉ USD</p>
        <div class="text-justify">Giới thiệu: 
            <p> <?php echo $city->cityIntro?> </p>
        </div>
    </div>
    <div class="text-right">
        <a href="index.php?page=edit&id=<?php echo $city->cityID?>" class="btn btn-warning btn-sm">Chỉnh sửa</a>
        <a href="index.php?page=delete&id=<?php echo $city->cityID?>" class="btn btn-danger btn-sm">Xóa</a>
    </div>
</div>