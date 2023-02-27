<?php 
    include "../includes/header.php";
    include "../../includes/database-connection.php";
    include "../../includes/functions.php";
    include "../../services/article.service.php";
    include "../../services/category.service.php";
    include "../../services/author.service.php";

    $categories = getAllCategories($pdo);
    $authors = getAllAuthors($pdo);
?>
<main class="container mt-5 mb-5">
    <?php
        if(isset($_GET['error'])){
            echo "<script>alert({$_GET['error']})</script>";
        }
    ?>
    <div class="row">
        <div class="col-sm">
            <h3 class="text-center text-uppercase fw-bold">Thêm bài viết</h3>
            <form action="../process/article/add.article.process.php" method="post" enctype="multipart/form-data">
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Tên bài viết</span>
                    <input type="text" class="form-control" name="tieude" value="<?= '' ?>">
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblSongName">Tên bài hát</span>
                    <input type="text" class="form-control" name="ten_bhat" value="<?= '' ?>">
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCategory">Thể loại</span>
                    <select id="categories" class="px-2" name="ma_tloai">
                        <?php foreach ($categories as $category) { ?>
                        <option value="<?= $category['ma_tloai'] ?>">
                            <?= $category['ten_tloai'] ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Tóm tắt</span>
                    <textarea class="form-control" aria-label="With textarea" name="tomtat"><?= '' ?></textarea>
                </div>

                <div class="input-group mt-3 mb-3 flex-nowrap">
                    <span class="input-group-text" id="lblCatName">Nội dung</span>
                    <textarea id="ckeditor" class="form-control" aria-label="With textarea" name="noidung"><?= '' ?></textarea>
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Tác giả</span>
                    <select id="authors" class="px-2" name="ma_tgia">
                        <?php foreach ($authors as $author) { ?>
                        <option value="<?= $author['ma_tgia'] ?>">
                            <?= $author['ten_tgia'] ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Ngày viết</span>
                    <input type="date" class="form-control" name="ngayviet">
                </div>

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text" id="lblCatName">Thêm ảnh</span>
                    <input type="file" class="form-control" name="imgUpload" placeholder="Thêm ảnh">
                </div>

                <div class="form-group  float-end ">
                    <input type="submit" name="submit" value="Thêm bài viết" class="btn btn-success">
                    <a href="article.php" class="btn btn-warning ">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</main>
<?php include "../../includes/footer.php" ?>