<?php
session_start();
$gid = $_POST['gid'];

$array = removeElementWithValue($_SESSION['cart'],"gid",$gid);
$_SESSION['cart']  =$array;
function removeElementWithValue($array, $key, $value){
    foreach($array as $subKey => $subArray){
        if($subArray[$key] == $value){
            unset($array[$subKey]);
        }
    }
    return $array;
}
header("Location:basket.php");