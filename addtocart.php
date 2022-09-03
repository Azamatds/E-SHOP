<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $gid = $_POST['gid'];
        $gname = $_POST['gname'];
        $gprice = $_POST['gprice'];
        $gimage = $_POST['gimage'];
        session_start();

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        $fond = false;
        for ($i = 0; $i<count($_SESSION['cart']);$i++){
            if ($_SESSION['cart'][$i]['gid'] == $gid){
                $_SESSION['cart'][$i]['gid']+=1;
                $fond = true;
                break;
            }

        }
        if (!$fond){
            $_SESSION['cart'][] = array('gid'=>$_POST['gid'],'gnum'=>1,'gname'=>$gname,'gprice'=>$gprice,
                'gimage'=>$gimage);
        }
    }
    header("Location:home.php");