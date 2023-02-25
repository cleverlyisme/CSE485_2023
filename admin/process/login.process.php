<?php
    include "../..//includes/database-connection.php";
    include "../../includes/functions.php";
    session_start();

    if(isset($_POST['btnLogin'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $remember = $_POST['remember'];

        $sql = "SELECT * FROM users WHERE username=:username and password=:password";

        $data = pdo($pdo, $sql, ['username' => $username, 'password' => $password]);

        if($data){
            if ($remember) {
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
            } else {
                unset($_SESSION['username']);
                unset($_SESSION['password']);
            }

            $_SESSION['user'] = $data[0]['username'];
            header("Location:../home/index.php");
        } else{
            header("Location:../../login.php?error='Invalid user or pass'");
        }
    }
?>