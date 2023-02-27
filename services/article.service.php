<?php 
function getAllArticles(PDO $pdo) {
    $sql = "SELECT ma_bviet, tieude, ten_bhat, ten_tloai, tomtat, ten_tgia, ngayviet, hinhanh FROM baiviet LEFT JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai LEFT JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia;";

    return pdo($pdo, $sql)->fetchAll();
}

function getArticleById(PDO $pdo, int $id) {
    $sql = "SELECT ma_bviet, tieude, ten_bhat, ten_tloai, tomtat, noidung, ten_tgia, ngayviet, hinhanh FROM baiviet LEFT JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai LEFT JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia WHERE ma_bviet=:ma_bviet;";

    return pdo($pdo, $sql, ['ma_bviet' => $id])[0];
}

function getArticleByName(PDO $pdo, string $tieude){
    $sql = "SELECT ma_bviet, tieude, hinhanh FROM baiviet WHERE tieude REGEXP :tieude;";
    return pdo($pdo, $sql, ['tieude'=> $tieude]);
}