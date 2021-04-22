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
    <title>Document</title>
    <link rel="stylesheet" href="../mdb/css/mdb.min.css"/>
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../bootstrap/icons/bootstrap-icons.css">
</head>
<body>
<header>
    <?php
    include_once('../header.php');

    if ($getUserType == 0) {
        header('Location: /settings');
    } else if ($getUserType == 1) {
        include_once('userTypes/student/index.php');
    } else if ($getUserType == 2) {
        include_once('userTypes/parent/index.php');
    } else if ($getUserType == 3) {
        include_once('userTypes/student/index.php');
    }
    ?>
    <script src="../mdb/js/mdb.min.js"></script>
</body>
</html>