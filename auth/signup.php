<?php
include_once('../db.php');
include_once("../operations/publicOperations.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>YouCan || SignUp</title>
    <link rel="stylesheet" href="../mdb/css/mdb.min.css" />
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/global.css">
    <link rel="stylesheet" href="../bootstrap/icons/bootstrap-icons.css">
</head>
<body>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Sign up</li>
    </ol>
</nav>

<div class="container">
    <form class="signUpForm form-submit" method="post">
        <div class="row mb-4 fullName">
            <div id="regPageErrors">
                <?php if (isset($error)){echo "* " . $error;}?>
            </div>
            <div class="col">
                <div class="form-outline">
                    <input type="text" id="regFirstName" class="form-control" name="reg_first_name" onkeyup="regButtonToggleDisable()" minlength="2" maxlength="20" required/>
                    <label class="form-label" for="regFirstName">First name</label>
                </div>
            </div>
            <div class="col lastName">
                <div class="form-outline">
                    <input type="text" id="regLastName" class="form-control" name="reg_last_name" onkeyup="regButtonToggleDisable()" minlength="2" maxlength="24" required/>
                    <label class="form-label" for="regLastName">Last name</label>
                </div>
            </div>
        </div>

        <div class="form-outline mb-4">
            <input type="email" id="email" class="form-control" name="reg_email" onkeyup="checkMailStatus(); regButtonToggleDisable(); checkFuncForEmail()" minlength="7" maxlength="34" required/>
            <label class="form-label" for="email">Email address</label>
        </div>
        <p id="emailCheck" class="errorCheckForInput"></p>
        <div class="form-outline mb-4">
            <input type="text" id="regPassword" class="form-control" name="reg_pass" onkeyup="regButtonToggleDisable(); regButtonCheckForPassword()" minlength="8" maxlength="30" required  autocomplete="off" />
            <label class="form-label" for="regPassword">Password</label>
        </div>
        <p id="passCheck" class="errorCheckForInput"></p>
        <button type="submit" name="reg_submit" id="regButton" class="btn text-white ht-button btn-block mb-4 signUpSubmitButton" disabled>Sign up</button>
        <p>Already have an account? <a href="signin.php">SignIn</a></p>
    </form>
</div>
<script src="../bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="../mdb/js/mdb.min.js"></script>
<script src="../js/smtp.js"></script>
<script src="../js/sendEmail.js"></script>
<script src="../js/auth.js"></script>
</body>
</html>