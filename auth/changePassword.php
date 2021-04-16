<?php
include_once('../db.php');
include_once("../operations/publicOperations.php");
if (!isset($_GET['changePassId']) || $_GET['changePassId'] = null || strlen($_GET['changePassId']) < 3){
    header("Location: /auth/signin.php");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>YouCan || Change password</title>
    <link rel="stylesheet" href="../mdb/css/mdb.min.css" />
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../bootstrap/icons/bootstrap-icons.css">
</head>
<body>
<div class="container">
    <form class="form-submit" method="post" >
        <div>Change <?php if (isset($rowFirstName)){ echo $rowFirstName; } ?>'s password</div>
        <div id="regPageErrors">
            <?php if (isset($error)){echo "* " . $error;}?>
        </div>
        <div class="form-outline mb-4">
            <input type="text" id="password" class="form-control" onkeyup="checkChangePassword()" name="password" minlength="8" maxlength="45" autocomplete="off" required/>
            <label class="form-label" for="password">Password</label>
        </div>
        <p id="passCheck" class="errorCheckForInput"></p>
        <div class="form-outline mb-4">
            <input type="text" id="passwordTwo" class="form-control" onkeyup="checkChangePassword()" name="passwordTwo" minlength="8" maxlength="45" autocomplete="off" required/>
            <label class="form-label" for="passwordTwo">Repeat Password</label>
        </div>
        <p id="passCheckTwo" class="errorCheckForInput"></p>
        <button type="submit" id="changePassButton" name="change_pass_submit" class="btn btn-success btn-block signInSubmitButton" disabled>Change Password</button>
    </form>
</div>

<script src="../js/auth.js"></script>
<script type="text/javascript" src="../mdb/js/mdb.min.js"></script>
</body>
</html>
