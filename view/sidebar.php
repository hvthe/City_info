
<div class="sidebar">
        <ul class="sidebar__list">
            <li class="sidebar_item">
                <a href="index.php?view=country" class="sidebar_link <?php if($_GET['view'] == 'country'){echo 'active';}?>">Quốc gia</a>
            </li>
            <li class="sidebar_item">
                <a href="index.php?view=city" class="sidebar_link <?php if($_GET['view'] !== 'country' && $_GET['view'] !== 'people'){echo 'active';}?>">Thành Phố</a>
            </li>
            <li class="sidebar_item">
                <a href="index.php?view=people" class="sidebar_link <?php if($_GET['view'] == 'people'){echo 'active';}?>">Dân đen</a>
            </li>
        </ul>
    </div>