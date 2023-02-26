<?php 
function getAllCategories(PDO $pdo) {
    $sql = "SELECT * FROM theloai;";

    return pdo($pdo, $sql)->fetchAll();
}