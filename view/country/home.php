<div class="content">
    <div class="header">
        <h2 class="heading">Danh sách Quốc gia</h2>
        <a href="index.php?view=country&page=add" class="btn btn-success btn-sm"> Thêm quốc gia</a>
    </div>
    
    <table class="table table-bordered table-striped">
        <thead class="bg-info text-light">
            <tr>
                <td>#</td>
                <td>Quốc gia</td>
                <td>Cờ quốc gia</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody class="bg-light">
            <?php foreach ($countries as $key => $country) { ?>
                <tr>
                    <td><?php echo ++$key ?></td>
                    <td>
                        <span class="col-lg-6"><?php echo $country->countryName ?> </span>
                    </td>
                    <td>
                        <img src="./images/<?php echo $country->countryFlag ?>" height="40px" alt=""></td>

                    </td>
                    <td>
                        <a href="index.php?view=country&page=edit&id=<?php echo $country->countryID ?>" class="btn btn-warning btn-sm">Chỉnh sửa</a>
                        <a href="index.php?view=country&page=delete&id=<?php echo $country->countryID ?>" class="btn btn-danger btn-sm">Xóa</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>