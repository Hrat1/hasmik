<nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="/dashboard">You Can</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <?php
        if (isset($_SESSION['u_id'])){
            echo "<a href='/operations/logout.php'>Log Out</a>";
        }else{
            echo '<div class="collapse navbar-collapse" id="navbarNav">
                    <ul id="mainNav" class="navbar-nav mr-auto">
                        <li class="nav-item d-none">
                            <a class="nav-link" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#courses">Courses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#pricing">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#aboutUs">About Us</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link loginLink" href="auth/signin.php">SignIn</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link registerLink" href="auth/signup.php">SignUp</a>
                        </li>
                    </ul>
                </div>';
        }
    ?>

</nav>