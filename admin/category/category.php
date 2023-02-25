<?php 
        include "../includes/header.php";
        include "../../includes/database-connection.php";
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
                            <a href="edit_category.php?id=1"><i class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                        <td>
                            <a href=""><i class="fa-solid fa-trash"></i></a>
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