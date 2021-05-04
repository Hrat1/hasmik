<?php
include_once('../db.php');
include_once("../operations/publicOperations.php"); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>YouCan || Sign In</title>
    <link rel="stylesheet" href="../mdb/css/mdb.min.css" />
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../bootstrap/icons/bootstrap-icons.css">
</head>
<body>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Sign In</li>
    </ol>
</nav>
<div class="container">
    <form class="signInForm form-submit" method="post">
        <div id="regPageErrors">
            <?php if (isset($error)){echo "* " . $error;}?>
        </div>
        <div class="form-outline mb-4">
            <input type="email" id="email" class="form-control -bs" value="<?php echo (isset($loginEmail))?$loginEmail:''; ?>" name="log_email" onkeyup="checkFuncForLoginEmail()" minlength="7" maxlength="34" required/>
            <label class="form-label" for="email">Email address</label>
        </div>
        <p id="emailCheck" class="errorCheckForInput"></p>
        <div class="form-outline mb-4">
            <input type="password" id="loginPass" class="form-control" name="log_password" minlength="8" maxlength="30" required/>
            <label class="form-label" for="loginPass">Password</label>
        </div>
        <div class="row mb-3 signInLinkSection">
            <div class="col">
                <a href="forgotPassword.php" class="link">Forgot password?</a>
            </div>
        </div>
        <button type="submit" name="log_submit" class="btn btn-block signInSubmitButton text-white ht-button">Sign in</button>
        <p>Not a member? <a href="signup.php">Register</a></p>
    </form>
</div>

<script src="../js/auth.js"></script>
<script type="text/javascript" src="../mdb/js/mdb.min.js"></script>
</body>
</html>
