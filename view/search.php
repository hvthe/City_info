<div class="content">
    <div class="header">
        <h2 class="heading">Kết quả tìm kiếm</h2>
        <a href="index.php" class="btn btn-success btn-sm"> Danh sách thành phố</a>
    </div>
    <?php echo "<p>Có $numRows kết quả cho từ khóa: <span class=\"font-italic\">$message</span> </p>" ?>
    <nav class="navbar">
        <form action="index.php?view=city&page=search" class="form-inline" method="post">
            <input class="form-control mr-sm-1" name="keyWord" type="search" value="<?php if(isset($_POST['keyWord'])){echo $_POST['keyWord'];}?>" placeholder="Tên thành phố...">
            <button class="btn btn-primary my-1 my-sm-0" name="sbm" type="submit">Search</button>
        </form>
    </nav>
    <table class="table table-bordered table-striped">
        <thead class="bg-info text-light">
            <tr>
                <td>#</td>
                <td>Thành phố</td>
                <td>Quốc gia</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody class="bg-light">
            <?php foreach ($results as $key => $city) { ?>
                <tr>
                    <td><?php echo ++$key ?></td>
                    <td><?php echo $city[0]->cityName ?></td>
                    <td><?php echo $city[1]->countryName ?> <img src="./images/<?php echo $city[1]->countryFlag ?>" height="40px" alt=""></td>
                    <td>
                        <a href="index.php?page=detail&id=<?php echo $city[0]->cityID ?>" class="btn btn-warning btn-sm">Chi tiết</a>
                        <a href="index.php?page=delete&id=<?php echo $city[0]->cityID ?>" class="btn btn-danger btn-sm">Xóa</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>