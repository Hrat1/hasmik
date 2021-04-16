<?php
session_start();
if (isset($_SESSION['u_id'])) {
    unset($_SESSION['u_id']);
    session_unset();
    session_destroy();
    header("Location: /auth/signin.php");
}elseif (isset($_SESSION['a_id'])) {
    unset($_SESSION['a_id']);
    session_unset();
    session_destroy();
    header("Location: /auth/signin.php");
}else{
    header('Location: /auth/signin.php');
}
