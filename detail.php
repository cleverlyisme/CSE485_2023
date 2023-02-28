<?php include "./includes/header.php" ?>
</header>
<?php
    require './includes/database-connection.php';
    require './includes/functions.php';
    $id = $_GET['id'];
    $sql = "SELECT baiviet.ma_bviet, baiviet.tieude, baiviet.ten_bhat,baiviet.tomtat, tacgia.ten_tgia, theloai.ten_tloai, baiviet.ngayviet, baiviet.hinhanh FROM baiviet JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai WHERE baiviet.ma_bviet = '" . $id . "'";
    $result = pdo($pdo, $sql)->fetchAll();
    ?>

<main class="container mt-5">
    <div class="row mb-5">
        <div class="col-sm-4">
            <img src="./images/songs/<?php echo ($result[0]['hinhanh'])?>" class="img-fluid" alt="...">

        </div>
        <div class="col-sm-8">
            <h5 class="card-title mb-2">
                <a href="#" class="text-decoration-none"><?php echo $result[0]['ten_bhat'] ?></a>
            </h5>
            <p class="card-text"><span class=" fw-bold">Bài hát: </span><?php echo $result[0]['ten_bhat'] ?></p>
            <p class="card-text"><span class=" fw-bold">Thể loại: </span><?php echo $result[0]['ten_tloai']?></p>
            <p class="card-text"><span class=" fw-bold">Tóm tắt: </span><?php echo $result[0]['tomtat'] ?></p>
            <p class="card-text"><span class=" fw-bold">Nội dung: </span><?php echo $result[0]['tomtat'] ?></p>
            <p class="card-text"><span class=" fw-bold">Tác giả: </span><?php echo $result[0]['ten_tgia'] ?></p>

        </div>
    </div>
</main>
<?php include "./includes/footer.php" ?>