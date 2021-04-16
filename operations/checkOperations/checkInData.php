<?php
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