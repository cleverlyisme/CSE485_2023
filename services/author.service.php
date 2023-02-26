<?php 
function getAllAuthors(PDO $pdo) {
    $sql = "SELECT * FROM tacgia;";

    return pdo($pdo, $sql)->fetchAll();
}