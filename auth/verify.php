<?php
include_once('../db.php');
include_once('../operations/publicOperations.php');
if  (!isset($_GET['vkey']) || $_GET['vkey'] == null){
    header("Location: /auth/signin.php");
}
?>

<title>YouCan || Verify your account </title>
<link rel="stylesheet" href="../style/main.css">
<div class="verification-response">
    <h2 class="verificationTitle">
        <?php
        if (isset($responseTitle)) {
            echo $responseTitle;
        }
        ?>
    </h2>
    <h3 class="verificationDescription">
        <?php
        if (isset($responseDescription)) {
            echo $responseDescription;
        }
        ?>
    </h3>

</div>
