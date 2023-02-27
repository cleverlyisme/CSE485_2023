<?php
    include "../../../includes/database-connection.php";
    include "../../../includes/functions.php";

    $target_dir = "../../../images/songs/";
    $target_file = $target_dir . basename($_FILES["imgUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    if(isset($_POST["submit"])) {
        $tieude = $_POST["tieude"];
        $ten_bhat = $_POST["ten_bhat"];
        $ma_tloai = $_POST["ma_tloai"];
        $tomtat = $_POST["tomtat"];
        $noidung = $_POST["noidung"];
        $ma_tgia = $_POST["ma_tgia"];
        $ngayviet = $_POST["ngayviet"];

        if ($tieude == '' || $ten_bhat == '' || $tomtat == '' || $ngayviet == '' || !$ma_tloai || !$ngayviet)
            header("Location:../../article/article.php?error='Giá trị không hợp lệ'");
        
        if (!basename($_FILES["imgUpload"]["name"])) {
            $sql = "INSERT INTO baiviet (tieude, ten_bhat, ma_tloai, tomtat, noidung, ma_tgia, ngayviet) VALUE (:tieude, :ten_bhat, :ma_tloai, :tomtat, :noidung, :ma_tgia, :ngayviet);";
                    
            pdo($pdo, $sql, [
                'tieude' => $tieude, 
                'ten_bhat' => $ten_bhat,
                'ma_tloai' => $ma_tloai,
                'tomtat' => $tomtat,
                'noidung' => $noidung,
                'ma_tgia' => $ma_tgia,
                'ngayviet' => $ngayviet,
            ]);

            header("Location:../../article/article.php");
        } else {
            $check = getimagesize($_FILES["imgUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
            
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            
            if ($uploadOk == 0) {
                header("Location:../../article/article.php?error='Thêm ảnh thất bại'");
            } else {
                if (move_uploaded_file($_FILES["imgUpload"]["tmp_name"], $target_file)) {
                    $sql = "INSERT INTO baiviet (tieude, ten_bhat, ma_tloai, tomtat, noidung, ma_tgia, ngayviet, hinhanh) VALUE (:tieude, :ten_bhat, :ma_tloai, :tomtat, :noidung, :ma_tgia, :ngayviet, :hinhanh);";
                    
                    pdo($pdo, $sql, [
                        'tieude' => $tieude, 
                        'ten_bhat' => $ten_bhat,
                        'ma_tloai' => $ma_tloai,
                        'tomtat' => $tomtat,
                        'noidung' => $noidung,
                        'ma_tgia' => $ma_tgia,
                        'ngayviet' => $ngayviet,
                        'hinhanh' => basename($_FILES["imgUpload"]["name"])
                    ]);

                    header("Location:../../article/article.php");
                } else {
                    header("Location:../../article/article.php?error='Thêm mới bài viết thất bại'");
                }
            }
        }
    }