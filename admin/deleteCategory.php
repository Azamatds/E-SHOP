<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $gid = $_POST['catid'];

    if ($gid) {
        include '../db/DB.php';
        $d = deleteCategory($gid);
        echo "<p>" . $d . "</p>";
    }
//    header("Location:home.php");
}