<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    session_start();
    if (!isset($_SESSION['user'])){
        header("Location:loginForm.php");
    }
    require_once 'db/DB.php';
    foreach ($_SESSION['cart'] as $subkey => $subArray){
        buyGood($_SESSION['user']['id'],$subArray['gid'],$subArray['gnum']);
    }
    unset($_SESSION['cart']);
}