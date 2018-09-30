<?php
    session_start();
    include("includes/header.php");
    if(isset($_SESSION['unique'])){
        header('location: includes/welcome.php');
    }
?>
    <div class="login-page">
        <div class="form">
            <form class="register-form" action="includes/register.php" method="post">
                <input type="text" placeholder="Username" name="usern" required="required" />
                <input type="email" placeholder="email address" name="email" required="required" />
                <input type="password" placeholder="password" name="pass" required="required" />
                <button>create</button>
                <p class="message">Already registered? <a href="#">Sign In</a></p>
            </form>
            <form class="login-form" action="includes/auth.php" method="post">
                <input type="text" placeholder="Username" name="username" required="required" />
                <input type="password" placeholder="password" name="password" required="required" />
                <button>login</button>
                <p class="message">Not registered? <a href="#">Create an account</a></p>
            </form>
        </div>
    </div>
    <?php
    include("includes/footer.php");
?>
