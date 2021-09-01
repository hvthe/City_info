<div class="content">
    <div class="header">
        <h2 class="heading">Danh sách thành phố</h2>
        <a href="index.php?view=city&page=add" class="btn btn-success btn-sm"> Thêm thành phố</a>
    </div>
    <nav class="navbar">
        <form class="form-inline" action="index.php?view=city&page=search" method="post">
            <input name="keyWord" type="text" placeholder="Tên thành phố..." required value="<?php if(isset($_POST['keyWord'])){echo $_POST['keyWord'];} ?>" class="form-control mr-sm-1">
            <button type="submit" class="btn btn-primary my-1 my-sm-0">Search</button>
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
                    <td>
                        <span class="col-lg-6"><?php echo $city[1]->countryName ?> </span>
                        <img src="./images/<?php echo $city[1]->countryFlag ?>" height="40px" alt=""></td>
                    <td>
                        <a href="index.php?view=city&page=detail&id=<?php echo $city[0]->cityID ?>" class="btn btn-warning btn-sm">Chi tiết</a>
                        <a href="index.php?view=city&page=delete&id=<?php echo $city[0]->cityID ?>" class="btn btn-danger btn-sm">Xóa</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>