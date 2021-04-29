<?php
include_once("../operations/privateOperatins.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>YouCan</title>
    <link rel="stylesheet" href="../mdb/css/mdb.min.css"/>
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/private.css">
    <link rel="stylesheet" href="../bootstrap/icons/bootstrap-icons.css">
</head>
<body style="background-color: #eff2f5!important;">
    <?php
    include_once('../header.php');

    if ($getUserType == 0) {
//        if user not registered successfully change location to settings page
        header('Location: /settings');
    } else if ($getUserType == 1) {
//        student side
        include_once('userTypes/student/index.php');
    } else if ($getUserType == 2) {
//        parent side
        include_once('userTypes/parent/index.php');
    } else if ($getUserType == 3) {
//        children side
        include_once('userTypes/student/index.php');
    } else if ($getUserType == 4) {
//        teacher side
        include_once('userTypes/teacher/index.php');
    }
    ?>
    <script src="../bootstrap/js/jquery.min.js"></script>
    <script src="../js/private.js"></script>
    <script src="../js/api.js"></script>
    <script src="../mdb/js/mdb.min.js"></script>
</body>
</html>