<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $ok = true;
        $url = "";
        $login = $_POST['login'];
        $password = $_POST['password'];


        if (isset($login) && isset($password)){
            require_once 'db/DB.php';
            $user = getUser($login);
            if ($user==null){
                header("Location:registerForm.php?message = userNotExist");
                $ok = false;
            }
            if ($user['password'] != sha1($password)){
                header("Location:registerForm.php?message = passwordIncorrect");
                $ok = false;
            }
            if ($ok){
                session_start();
                $_SESSION['user'] = $user;
                $url = "home.php";
                if ($user['code'] == 'Admin'){
                    $url = "admin.php";
                }
                header("Location:$url");
            }
        }
    }
