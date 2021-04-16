<?php
include_once("encrypt.php");
include_once("session.php");
publicSession($conn);

//registration page operations

if (isset($_POST["reg_submit"])) {
    if (isset($_POST['reg_first_name'], $_POST['reg_last_name'], $_POST['reg_email'], $_POST['reg_pass'])) {
        $first_name = ucfirst($_POST['reg_first_name']);
        $last_name = ucfirst($_POST['reg_last_name']);
        $pass = $_POST['reg_pass'];
        $email = strtolower($_POST['reg_email']);
        $email = mysqli_real_escape_string($conn, $email);
        $replacedEmail = str_replace([':', '\\', '/', '*', ' ', '#', '!', '±', '§', '`', '~', '"', '|', ';', '&', '^', '%', '=', '+', ','], "", $email);
        $regSuccess = "<div class='regSuccess'><h4>You are successfully registered</h4><h6>Thanks for signing up. Confirm your mail address is <span>" . $email . "</span> to activate your account.</h6></div>";

        if (empty($first_name) || empty($last_name) || empty($pass) || empty($email)) {
            $error = "Please do not hack";
        } else if (strlen($replacedEmail) != strlen($email)) {
            $error = "Please write correct email address!";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Please write valid email";
        } else {
            $first_name = encrypt($first_name);
            $last_name = encrypt($last_name);
            $email = encrypt($email);
            $pass = encrypt($pass);
            $vkey = md5($email);

            $emailCheck = "select email from users where email='" . $email . "'";
            $resultOfEmailCheck = $conn->query($emailCheck);
            if ($resultOfEmailCheck->num_rows > 0) {
                $error = "Email already exists";
            } else {
                $sql = "INSERT INTO users (first_name, last_name, email, password, vkey)VALUES ('" . $first_name . "', '" . $last_name . "', '" . $email . "', '" . $pass . "', '" . $vkey . "')";
                if (mysqli_query($conn, $sql)) {
                    echo $regSuccess;
                    echo "<script>setTimeout(function(){document.location = 'signin.php';}, 4000);</script>";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    $error = "Please write correct values";
                }
            }
        }
    } else {
        $error = "Please do not hack.";
    }
}


//login page operations

if (isset($_POST['log_submit'])) {
    if (isset($_POST['log_email'], $_POST['log_password'])) {
        $email = strtolower($_POST['log_email']);
        $email = mysqli_real_escape_string($conn, $email);
        $replacedEmail = str_replace([':', '\\', '/', '*', ' ', '#', '!', '±', '§', '`', '~', '"', '|', ';', '&', '^', '%', '=', '+', ','], "", $email);
        $pass = $_POST['log_password'];

        if (empty($email) || empty($pass)) {
            $loginEmail = $email;
            $error = "Please write email and password";
        } else if (strlen($email) < 7) {
            $loginEmail = $email;
            $error = "The Email must be a minimum of 7 characters";
        } else if (strlen($pass) < 8) {
            $loginEmail = $email;
            $error = "The password must be a minimum of 8 characters";
        } else if (strlen($replacedEmail) != strlen($email)) {
            $loginEmail = $email;
            $error = "Please write correct email address!";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $loginEmail = $email;
            $error = "Please write valid email";
        } else {
            $email = encrypt($email);
            $pass = encrypt($pass);

            $loginRequest = "SELECT password, user_type, verified FROM users WHERE email = '$email'";
            $requestResult = $conn->query($loginRequest);

            if ($requestResult->num_rows > 0) {
                $requestResult = mysqli_fetch_assoc($requestResult);

                if ($requestResult['password'] === $pass && $requestResult['verified'] == 1) {
                    if ($requestResult['user_type'] > 3){
                        $_SESSION["a_id"] = $email;
                        echo "<script>location.reload();</script>";
                    }else {
                        $_SESSION["u_id"] = $email;
                        echo "<script>location.reload();</script>";
                    }
                } else if ($requestResult['verified'] == 0) {
                    $loginEmail = decrypt($email);
                    $error = "Please verify your account with mail";
                } else {
                    $loginEmail = decrypt($email);
                    $error = "Wrong password";
                }
            } else {
                $loginEmail = decrypt($email);
                $error = "email don't registered";
            }
        }
    }
}


//forgot password operations

if (isset($_POST['forgot_submit'])) {
    if (isset($_POST['forgot_email'])) {
        $email = strtolower($_POST['forgot_email']);
        $email = mysqli_real_escape_string($conn, $email);
        $replacedEmail = str_replace([':', '\\', '/', '*', ' ', '#', '!', '±', '§', '`', '~', '"', '|', ';', '&', '^', '%', '=', '+', ','], "", $email);
        $response = "<div class='forgotPassResponse'>Check your email for change password</div>";

        if (empty($email)) {
            $error = "Please write email";
        } else if (strlen($email) < 7) {
            $forgotEmail = $email;
            $error = "The Email must be a minimum of 7 characters";
        } else if (strlen($replacedEmail) != strlen($email)) {
            $forgotEmail = $email;
            $error = "Please write correct email address!";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $forgotEmail = $email;
            $error = "Please write valid email";
        } else {
            $email = encrypt($email);
            $row = $conn->query("SELECT  email, first_name, verified, forgot_pass FROM users WHERE  email ='$email' LIMIT 1");

            if ($row->num_rows == 1) {
                $date = date("d-m-Y H:i:s");
                $forEncryptVerifiedId = $email . $date;
                $encryptedVerifiedId = md5($forEncryptVerifiedId);

                $updateDBData = $conn->query("UPDATE users SET forgot_pass = '$encryptedVerifiedId' WHERE email = '$email' LIMIT 1");

                if ($updateDBData) {
                    echo $response;
                    echo "<script>setTimeout(function(){document.location = 'signin.php';}, 3000);</script>";
                } else {
                    echo $conn->error;
                }
            } else {
                $forgotEmail = decrypt($email);
                $error = "Email is not registered.";
            }
        }

    } else {
        $error = "Please write email";
    }
}


//verify page operations

if (isset($_GET['vkey']) && $_GET['vkey'] != null) {
    $vkey = $_GET['vkey'];
    $resultSet = $conn->query("SELECT vkey, verified FROM users WHERE  vkey ='$vkey' AND verified = 0 LIMIT 1");

    if ($resultSet->num_rows == 1) {
        $updateVerificationStatus = $conn->query("UPDATE users SET verified = 1 WHERE vkey = '$vkey' LIMIT 1");

        if ($updateVerificationStatus) {
            $responseTitle = "Your account has been verified.";
            $responseDescription = "You may now <a href='/auth/signin.php'>SignIn</a>.";
        } else {
            $responseTitle = $conn->error;
            $responseDescription = "<a href='index.php'>Home</a>";
        }
    } else {
        $responseTitle = "This account invalid or already verified";
        $responseDescription = "Do you want to create a new <a href='/auth/signup.php'>account</a>?";
    }
}


//change forgotten password


if (isset($_GET['changePassId']) && $_GET['changePassId'] != null) {
    $userId = $_GET['changePassId'];
    $resultSet = $conn->query("SELECT email, first_name, verified, forgot_pass FROM users WHERE  forgot_pass ='$userId' LIMIT 1");
    $response = "<div class='forgotPassResponse'>Your password successfully changed.</div>";
    if ($resultSet->num_rows == 1) {
        $row = mysqli_fetch_assoc($resultSet);
        $rowFirstName = decrypt($row['first_name']);
        if (isset($_POST['change_pass_submit'])) {
            if (isset($_POST['password']) && isset($_POST['passwordTwo']) && strlen($_POST['password']) > 7) {
                if ( $_POST['password'] == $_POST['passwordTwo']) {
                    $password = encrypt($_POST['password']);
                    $updatePasswordQuery = $conn->query("UPDATE users SET verified = '1', forgot_pass = NULL, password = '$password'  WHERE forgot_pass = '$userId' LIMIT 1");

                    if ($updatePasswordQuery) {
                        echo $response;
                        echo "<script>setTimeout(function(){document.location = '/auth/signin.php';}, 3000);</script>";
                    } else {
                        $error = $conn->error;
                    }
                }else {
                    $error = "Password fields don't equal.";
                }
            }else{
                $error = "Please fill  password fields";
            }
        }
    } else {
        header("Location: /auth/signin.php");
    }
}





