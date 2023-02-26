<?php
    include "../../../includes/database-connection.php";
    include "../../../includes/functions.php";

    $id = $_GET['id'];
    
    if (!$id) header("Location: ../../article/article.php");

    $sql = "DELETE FROM baiviet WHERE ma_bviet=:ma_bviet;";
    pdo($pdo, $sql, ['ma_bviet' => $id]);
    header("Location: ../../article/article.php");
?>