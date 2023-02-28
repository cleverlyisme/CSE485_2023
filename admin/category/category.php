<?php 
        include "../includes/header.php";
        include "../../includes/database-connection.php";
        if(isset($_GET['id'])){

            $id = $_GET['id'];

            $query_article = "DELETE FROM baiviet WHERE ma_tloai=:ma_tloai";
            $query_article_run = $pdo->prepare($query_article);
            $data = [
                ':ma_tloai' => $id,
            ];
            $query_article_execute = $query_article_run->execute($data);
            
            if($query_article_execute) {
                $query = "DELETE FROM theloai WHERE ma_tloai=:ma_tloai;";
                $query_run = $pdo->prepare($query);
                $data = [
                    ':ma_tloai' => $id,
                ];
                $query_execute = $query_run->execute($data);
                header("Location: category.php");
                exit(0);
            }
            ;
        }
?>

<main class="container mt-5 mb-5">
    <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
    <div class="row">
        <div class="col-sm">
            <a href="add_category.php" class="btn btn-success">Thêm mới</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên thể loại</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                            $query = "SELECT * FROM theloai";
                            $statement = $pdo->prepare($query);
                            $statement ->execute();

                            $result = $statement->fetchAll();
                            if($result){
                                foreach($result as $row){
                                    ?>
                    <tr>
                        <th><?= $row['ma_tloai']; ?></th>
                        <td><?= $row['ten_tloai']; ?></td>
                        <td>
                            <a href="edit_category.php?id=<?= $row['ma_tloai'] ?>"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                        <td>
                            <a href="<?= "category.php?id=" . $row['ma_tloai'] ?>" name="delete"><i
                                    class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php
                                }
                            } 
                            else {
                                ?>
                    <td>No Record Found</td>
                    <?php
                            }
                        ?>




                </tbody>
            </table>
        </div>
    </div>
</main>
<?php include "../../includes/footer.php" ?>