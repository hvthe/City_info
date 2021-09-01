<div class="content">
    <div class="header">
        <h2 class="heading">Thông tin người dân</h2>
        <a href="index.php?view=people&page=add" class="btn btn-success btn-sm">Đẻ dân</a>
    </div>
    <!-- <nav class="navbar">
        <form class="form-inline" action="index.php?page=search" method="post">
            <input name="keyWord" type="text" placeholder="Tên thành phố..." required class="form-control mr-sm-1">
            <button type="submit" class="btn btn-primary my-1 my-sm-0">Search</button>
        </form>
    </nav> -->
    <table class="table table-bordered table-striped">
        <thead class="bg-info text-light">
            <tr>
                <td>#</td>
                <td>Họ Tên</td>
                <td>Tuổi</td>
                <td>Giới tính</td>
                <td>Ảnh</td>
                <td>Thành Phố</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody class="bg-light">
            <!-- <?php foreach ($results as $key => $value) { ?> -->
                <tr >
                    <td class="align-middle"><?php echo ++$key ?></td>
                    <td class="align-middle"><?php echo $value[0]->name ?></td>
                    <td class="align-middle"><?php echo $value[0]->age ?></td>
                    <td class="align-middle"><?php echo $value[0]->gender == 1? 'Nam':'Nữ' ?></td>
                    <td><img src="./images/<?php echo $value[0]->image ?>" width = "100px" alt=""></td>
                    <td class="align-middle"><?php echo $value[1]->cityName ?></td>
                    <td class="align-middle">
                        <a href="index.php?view=people&page=edit&id=<?php echo $value[0]->peopleID ?>" class="btn btn-warning btn-sm">Chi tiết</a>
                        <a href="index.php?view=people&page=delete&id=<?php echo $value[0]->peopleID ?>" class="btn btn-danger btn-sm">Xóa</a>
                    </td>
                </tr>
            <!-- <?php } ?> -->
        </tbody>
    </table>
</div>