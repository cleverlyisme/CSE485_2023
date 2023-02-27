<?php include "../includes/header.php" ?>
<?php 
    include "../../includes/database-connection.php";
    if(isset($_GET['id'])){

        $categoryID = $_GET['id'];
                            
        $query = "SELECT * FROM theloai WHERE ma_tloai=:cate_id LIMIT 1";
        $statement = $pdo->prepare($query);
        $data = [
            ':cate_id' => $categoryID,
        ];
        $statement -> execute($data);
        $result = $statement->fetch(PDO::FETCH_OBJ);
    }

    if(isset($_POST["save"])){
        $categoryID = $_POST['txtMaTloai'];
        $categoryName = $_POST['txtTenTloai'];
        try {
            $query = "UPDATE theloai SET ten_tloai=:ten_tloai WHERE ma_tloai=:cate_id  ";
            $statement = $pdo->prepare($query);
            $data = [
                ":ten_tloai" => $categoryName ,
                ':cate_id' => $categoryID,
            ];

            $query_execute = $statement->execute($data);
            echo "SAVE";
            if($query_execute){
                header("Location: category.php");
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
            <h3 class="text-center text-uppercase fw-bold">Sửa thông tin thể loại</h3>
            <form method="post">
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatId">Mã thể loại</span>
                    <input type="text" class="form-control" name="txtMaTloai" value="<?= $result->ma_tloai; ?>">
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Tên thể loại</span>
                    <input type="text" class="form-control" name="txtTenTloai" value="<?= $result->ten_tloai; ?>">
                </div>


                <button type="submit" name="save" class="btn btn-success">Lưu lại</button>
                <a href="category.php" class="btn btn-warning ">Quay lại</a>

            </form>
        </div>
    </div>
</main>
<?php include "../../includes/footer.php" ?>