<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $login = $_POST['login'];
        $password = $_POST['password'];
        $fullname = $_POST['fullname'];
        $repassword = $_POST['repassword'];

        if (isset($login) && isset($password)){
            require_once 'db/DB.php';
            $user = getUser($login);
            if ($user!=null){
                header("Location:registerForm.php?message = userExist");
            }
            if (strlen($password) != strlen($repassword)){
                header("Location:registerForm.php?message = passwordLength");
            }
            registerUser($login,sha1($password),$fullname);
        }
    }
