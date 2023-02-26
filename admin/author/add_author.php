<?php include "../includes/header.php" ?>
<?php include "../../includes/database-connection.php";
    if(isset($_POST["add"])){
        $nameAuthor = $_POST["ten_tgia"];
        $imageAuthor = $_POST["hinh_tgia"];
        $query = "INSERT INTO tacgia (ten_tgia,hinh_tgia) VALUES (:nameAuthor, :imageAuthor)";
        $query_run = $pdo->prepare($query);
        $data = [
            ':nameAuthor' => $nameAuthor,
            ':imageAuthor' => $imageAuthor
        ];
            $query_execute = $query_run->execute($data);
            if($query_execute) {
                header("Location: author.php");
                exit(0);
            }
    }
?>
<main class="container mt-5 mb-5">
    <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
    <div class="row">
        <div class="col-sm">
            <h3 class="text-center text-uppercase fw-bold">Thêm mới tác giả</h3>
            <form method="post">
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Tên tác giả</span>
                    <input type="text" name="ten_tgia" class="form-control" name="txtCatName">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Hình tác giả</span>
                    <input type="file" name="hinh_tgia" class="form-control" name="txtCatName">
                </div>

                <button class="btn btn-success" name="add">Thêm</button>
                <a href="category.php" class="btn btn-warning ">Quay lại</a>
            </form>
        </div>
    </div>
</main>
<?php include "../../includes/footer.php" ?>