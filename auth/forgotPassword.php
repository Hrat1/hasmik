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
    <title>YouCan || Forgot Password</title>
    <link rel="stylesheet" href="../mdb/css/mdb.min.css" />
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../bootstrap/icons/bootstrap-icons.css">
</head>
<body>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
        <li class="breadcrumb-item" ><a href="signin.php">Sign In</a></li>
        <li class="breadcrumb-item active" aria-current="page">Forgot Password</li>
    </ol>
</nav>
<div class="container">
    <form class="form-submit" method="post">
        <div id="regPageErrors">
            <?php if (isset($error)){echo "* " . $error;}?>
        </div>
        <div class="form-outline mb-4">
            <input type="email" id="email" class="form-control -bs" name="forgot_email" value="<?php echo (isset($forgotEmail))?$forgotEmail:''; ?>" onkeyup="checkMailStatus()" minlength="7" maxlength="34" required/>
            <label class="form-label" for="email">Email address</label>
        </div>
        <p id="emailCheck" class="errorCheckForInput"></p>
        <button type="submit" name="forgot_submit" id="forgotButton" class="btn btn-success btn-block signInSubmitButton">Forgot</button>
    </form>
</div>

<script src="../bootstrap/js/jquery.min.js"></script>
<script src="../js/auth.js"></script>
<script type="text/javascript" src="../mdb/js/mdb.min.js"></script>
</body>
</html>
