<?php
session_start();
// we need
// inc/autoloader.inc.php
// classes/dbh.class.php
// index.php

include "inc/autoloader.inc.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>17OOPPHP - MVC Model</title>
    <link rel="stylesheet" href="./media/css/app.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="./media/js/app.js" defer></script>
</head>

<body>
    <main>
        <section>
            <?php



            if (isset($_SESSION["userid"])) {
                echo $_SESSION['username'] . "<br/><a href='inc/logout.inc.php'>Logout</a>";
            } else {
                echo "<a href='inc/login.inc.php'>Login</a>";
            }

            ?>
        </section>
        <section class="login-signup">
            <div class="signUp">

                <h4>SIGN UP</h4>
                <form action="inc/signup.inc.php" method="post">
                    <div class="input-group">
                        <input type="text" name="username" placeholder="Name">
                        <label for="name">Username</label>
                        <span class="invalid-feedback">Mensaje a mostrar</span>
                    </div>
                    <div class="input-group">
                        <input type="password" name="password" placeholder="Password">
                        <label for="pwd">Password</label>
                        <span class="invalid-feedback">Mensaje a mostrar</span>
                    </div>
                    <div class="input-group">
                        <input type="password" name="repassword" placeholder="Repeat password">
                        <label for="pwdrepeat">Repeat Password</label>
                        <span class="invalid-feedback">Mensaje a mostrar</span>
                    </div>

                    <div class="input-group">
                        <input type="text" name="email" placeholder="Email">
                        <label for="email">Email</label>
                        <span class="invalid-feedback">Mensaje a mostrar</span>
                    </div>

                    <button class=" btn btn-orange bottom signin" type="submit" name="signup">Sign In</button>
                </form>
                <p>Already have an account? <span id="login"> Login here!</span></p>
            </div>
            <div class="logIn active">

                <h4>LOGIN</h4>
                <form action="inc/login.inc.php" method="post">
                    <div class="input-group">
                        <input type="text" name="username" placeholder="Name">
                        <label for="name">Username</label>
                        <span class="invalid-feedback">Mensaje a mostrar</span>
                    </div>
                    <div class="input-group">
                        <input type="password" name="password" placeholder="Password">
                        <label for="pwd">Password</label>
                        <span class="invalid-feedback">Mensaje a mostrar</span>
                    </div>

                    <button class="btn btn-green bottom login" type="submit" name="login">Login</button>
                </form>
                <p>Don't have an account yet? <span id="signup"> Sign up here!</span></p>
            </div>

        </section>
    </main>
</body>

</html>

<!-- <form action="" method="post">
    <div class="input-group">
        <select name="select" id="">
            <option value="" default selected>Select an option</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
            <option value="4">Option 4</option>
        </select>
        <label for="select">Select an option</label>
        <span class="invalid-feedback">Mensaje a mostrar</span>
    </div>
    <div class="input-group">
        <textarea rows="4" placeholder="Describe yourself here..."></textarea>
        <label for="description">Describe the content</label>
        <span class="invalid-feedback">Mensaje a mostrar</span>
    </div>
</form> -->