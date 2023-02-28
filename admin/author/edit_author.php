<?php include "../includes/header.php" ?>
<?php 
    include "../../includes/database-connection.php";
    if(isset($_GET['id'])){

        $authorID = $_GET['id'];
                            
        $query = "SELECT * FROM tacgia WHERE ma_tgia=:ma_tgia LIMIT 1";
        $statement = $pdo->prepare($query);
        $data = [
            ':ma_tgia' => $authorID,

        ];
        $statement -> execute($data);
        $result = $statement->fetch(PDO::FETCH_OBJ);
    }

    if(isset($_POST["save"])){
        $authorID = $_POST['txtMaTGia'];
        $authorName = $_POST['txtTenTgia'];
        $authorImage = $_POST['txtHinhTgia'];
        try {
            $query = "UPDATE tacgia SET ten_tgia=:ten_tgia, hinh_tgia=:hinh_tgia WHERE ma_tgia=:author_id  ";
            $statement = $pdo->prepare($query);
            $data = [
                ":ten_tgia" => $authorName ,
                ':author_id' => $authorID,
                ':hinh_tgia' => $authorImage,
            ];
            $query_execute = $statement->execute($data);
            if($query_execute){
                header("Location: author.php");
                exit(0);
            } 
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

?>
<main class="container mt-5 mb-5">
    <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
    <div class="row">
        <div class="col-sm">
            <h3 class="text-center text-uppercase fw-bold">Sửa thông tin tác giả</h3>
            <form method="post">
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatId">Mã tác giả</span>
                    <input type="text" class="form-control" name="txtMaTGia" value="<?= $result->ma_tgia; ?>">
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Tên tác giả</span>
                    <input type="text" class="form-control" name="txtTenTgia" value="<?= $result->ten_tgia; ?>">
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Hình tác giả</span>
                    <input type="file" class="form-control" name="txtHinhTgia" value="<?= $result->hinh_tgia; ?>">
                </div>

                <button type="submit" name="save" class="btn btn-success">Lưu lại</button>
                <a href="category.php" class="btn btn-warning ">Quay lại</a>

            </form>
        </div>
    </div>
</main>
<?php include "../../includes/footer.php" ?>