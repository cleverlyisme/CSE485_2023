<?php
    include "../../../includes/database-connection.php";
    include "../../../includes/functions.php";

    $id = $_GET['id'];
    
    if (!$id) header("Location: ../../article/article.php");

    $sql = "DELETE FROM baiviet WHERE ma_bviet=:ma_bviet;";

    try {
        pdo($pdo, $sql, ['ma_bviet' => $id]);
    } catch (Exception $e) { 
        header("Location:../../article/article.php?error='Cập nhật thất bại'");
    }
    header("Location: ../../article/article.php");
?>