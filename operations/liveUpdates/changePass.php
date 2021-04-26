<?php
session_start();
include_once('../../db.php');
include_once("../encrypt.php");

if (isset($_POST['changePass']) && $_POST['changePass'] != null) {
    $pass = $_POST['changePass'];
    if (strlen($pass) > 7) {
        $pass = encrypt($pass);
        $sql = "UPDATE users SET password='" . $pass . "' WHERE email='" . $_SESSION['u_id'] . "'";
        if (mysqli_query($conn, $sql)) {
            echo "Your password has changed.";
        } else {
            echo "Something is wrong please reload page";
        }
    }else{
        echo "Please write correct new password.";
    }
}
