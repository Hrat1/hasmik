<?php
session_start();
include_once('../../db.php');
include_once("../encrypt.php");

if (isset($_POST['username'])){
    $username = encrypt($_POST['username']);
    $sql="select username from users where username='". $username ."'";
    $result = $conn->query($sql);

    if (!$result) {
        trigger_error('Invalid query: ' . $conn->error);
    }
    if($result->num_rows > 0) {
        echo "Username already exists.";
    }else{
        echo "Username is not registered.";
    }
}


if (isset($_POST['email'])) {
    $email = encrypt($_POST['email']);
    $sql="select email from users where email='". $email ."'";
    $result = $conn->query($sql);

    if (!$result) {
        trigger_error('Invalid query: ' . $conn->error);
    }
    if($result->num_rows > 0) {
        echo "Email already exists.";
    }else{
        echo "Email is not registered.";
    }
}

//check password is equal to current password

if (isset($_POST['password'])) {
    $password = $_POST['password'];
    if (strlen($password) > 7 && $password != null && strlen($password) < 40) {
        $userId = $_SESSION['u_id'];
        $encPass = encrypt($password);

        $sql = "select * from users where email='" . $userId . "' and password='". $encPass ."' ";
        $result = $conn->query($sql);

        if (!$result) {
            trigger_error('Invalid query: ' . $conn->error);
        }

        if($result->num_rows > 0) {
            echo "Password is correct";
        }else {
            echo "Enter a valid password and try again.";
        }
    }else{
        echo "Enter a valid password and try again.";
    }
}