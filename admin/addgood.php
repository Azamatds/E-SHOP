<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($_FILES['gpic']['type'] == 'image/jpeg' || $_FILES['gpic']['type'] == 'image/png'){
            if ($_FILES['gpic']['size']<= 1024*1024){
                $filename = 'some.jpg';

                move_uploaded_file($_FILES['gpic']['tmp_name'],"../images/".$_FILES['gpic']['name']);
            }
        }
        $gname = $_POST['gname'];
        $gdesc = $_POST['gdescription'];
        $gprice = $_POST['gprice'];
        $qty = $_POST['qty'];
        $gct = $_POST['gct'];

        if ($gname && $gprice && $gdesc && $qty){
            include '../db/DB.php';
            addGood($gname,$gdesc,$gprice,$qty,$_FILES['gpic']['name'],$gct);
        }
    }
    header("Location:goods.php");
