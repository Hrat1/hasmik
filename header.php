<!--<nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">-->
<!--    <a class="navbar-brand" href="/dashboard">You Can</a>-->
<!--    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">-->
<!--        <span class="navbar-toggler-icon"></span>-->
<!--    </button>-->
<!--    --><?php
//        if (isset($_SESSION['u_id'])){
//            echo "<a href='/operations/logout.php'>Log Out</a>";
//        }else{
//            echo '<div class="collapse navbar-collapse" id="navbarNav">
//                    <ul id="mainNav" class="navbar-nav mr-auto">
//                        <li class="nav-item d-none">
//                            <a class="nav-link" href="#home">Home</a>
//                        </li>
//                        <li class="nav-item">
//                            <a class="nav-link" href="#courses">Courses</a>
//                        </li>
//                        <li class="nav-item">
//                            <a class="nav-link" href="#pricing">Pricing</a>
//                        </li>
//                        <li class="nav-item">
//                            <a class="nav-link" href="#aboutUs">About Us</a>
//                        </li>
//                    </ul>
//                    <ul class="navbar-nav">
//                        <li class="nav-item">
//                            <a class="nav-link loginLink" href="auth/signin.php">SignIn</a>
//                        </li>
//                        <li class="nav-item">
//                            <a class="nav-link registerLink" href="auth/signup.php">SignUp</a>
//                        </li>
//                    </ul>
//                </div>';
//        }
//    ?>
<!---->
<!--</nav>-->

<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarTogglerDemo03"
                aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <a class="navbar-brand" href="/dashboard">YouCan</a>

        <?php
        if (isset($_SESSION['u_id'])) {
            include_once "operations/checkOperations/checkUserType.php";
            ?>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item ht-dn-991">
                        <a class="nav-link ht-user" href="#">
                            <i class="fas fa-user-circle"></i>
                            <span class="ht-first-name"><?php echo $userFirstNameDecr;?></span>
                        </a>
                    </li>
                    <li class="nav-item ht-db-991">
                        <a class="nav-link" href="/settings">
                            <i class="fas fa-cog"></i>
                            Settings
                        </a>
                    </li>
                    <li class="nav-item ht-db-991">
                        <a class="nav-link" href="/operations/logout.php">
                            <i class="fas fa-sign-out-alt"></i>
                            LogOut
                        </a>
                    </li>
                    <li class="nav-item dropdown me-3 me-lg-1 ht-dn-991">
                        <a class="nav-link dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            <span class="fa-stack ht-dropdown">
                                <i class="fas fa-circle fa-stack-1x fa-lg"></i>
                                <i class="fas fa-caret-down fa-stack-1x"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="/settings">
                                    <i class="fas fa-cog"></i>
                                    Settings
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/operations/logout.php">
                                    <i class="fas fa-sign-out-alt"></i>
                                    LogOut
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <?php
        }
        ?>


    </div>
</nav>