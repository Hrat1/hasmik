<?php
include_once('../operations/privateOperatins.php');
privateSession($conn);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo (isset($settingsPageTitle)) ? $settingsPageTitle : "YouCan || Settings" ?></title>
    <link rel="stylesheet" href="../mdb/css/mdb.min.css"/>
    <link rel="stylesheet" href="../style/private.css">
    <link rel="stylesheet" href="../bootstrap/icons/bootstrap-icons.css">
</head>
<body>

<?php include_once("../header.php") ?>
<div class="my-wrapper">
    <div class="container-fluid container-lg">
        <div class="row">
            <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 s-left-side">
                <h3 class="sHeader">Settings</h3>
                <div class="nav flex-column nav-tabs text-center" id="v-tabs-tab" role="tablist"
                     aria-orientation="vertical">
                    <a class="nav-link active" id="v-tabs-home-tab" data-mdb-toggle="tab" href="#s-tabs-account"
                       role="tab"
                       aria-controls="v-tabs-home" aria-selected="true">General</a>
                    <a class="nav-link <?php echo ($getUserType == 0?'disabled':''); ?>" href="<?php echo ($getUserType == 0?'':'#s-tabs-security'); ?>" id="v-tabs-profile-tab" data-mdb-toggle="tab" role="tab"
                       aria-controls="v-tabs-profile" aria-selected="false">Security</a>
                </div>
            </div>

            <div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 s-right-side">
                <div class="tab-content" id="v-tabs-tabContent">
                    <div class="tab-pane fade show active" id="s-tabs-account" role="tabpanel"
                         aria-labelledby="v-tabs-home-tab">
                        <?php include_once "../operations/settingsOperations/account.php" ?>
                    </div>
                    <?php
                    if ($getUserType != 0) {
                        echo '<div class="tab-pane fade" id="s-tabs-security" role="tabpanel" aria-labelledby="v-tabs-profile-tab">
                            Profile content
                        </div>';
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
//if (isset($_GET['tab']) && $_GET['tab'] != NULL) {
//    $tabItem = $_GET['tab'];
//    if ($tabItem == "account") {
//        include_once("operations/settingsOperations/account.php");
//    } elseif ($tabItem == "security") {
//        if ($getUserType == 0) {
//            header('Location: index.php?tab=account');
//        } else {
//            include_once("operations/settingsOperations/security.php");
//        }
//    } else {
//        header('Location: index.php?tab=account');
//    }
//
//} else {
//    header('Location: index.php?tab=account');
//}
//?>

<script src="../bootstrap/js/jquery.min.js"></script>
<script src="../js/settingsPage.js"></script>
<script src="../js/api.js"></script>
<script type="text/javascript" src="../mdb/js/mdb.min.js"></script>
</body>
</html>

