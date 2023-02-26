<?php include "../includes/header.php" ?>
<?php 
    require "../../includes/database-connection.php";
    require "../../includes/functions.php";
    $sql = "SELECT * FROM `theloai`";
    $countTheloai = pdo($pdo, $sql)->fetchAll(); 
    $sql = "SELECT * FROM `users`";
    $countUsers = pdo($pdo, $sql)->fetchAll(); 
    $sql = "SELECT * FROM `tacgia`";
    $countTacgia = pdo($pdo, $sql)->fetchAll(); 
    $sql = "SELECT * FROM `baiviet`";
    $countBaiViet = pdo($pdo, $sql)->fetchAll();


?>
<main class="container mt-5 mb-5">
    <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
    <div class="row">
        <div class="col-sm-3">
            <div class="card mb-2" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        <a href="" class="text-decoration-none">Người dùng</a>
                    </h5>

                    <h5 class="h1 text-center">
                        <?php echo count($countUsers) ?>
                    </h5>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card mb-2" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        <a href="" class="text-decoration-none">Thể loại</a>
                    </h5>
                    <h5 class="h1 text-center">
                        <?php echo count($countTheloai) ?>
                    </h5>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card mb-2" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        <a href="" class="text-decoration-none">Tác giả</a>
                    </h5>

                    <h5 class="h1 text-center">
                        <?php echo count($countTacgia) ?>

                    </h5>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card mb-2" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        <a href="" class="text-decoration-none">Bài viết</a>
                    </h5>

                    <h5 class="h1 text-center">
                        <?php echo count($countBaiViet) ?>

                    </h5>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include "../../includes/footer.php" ?>