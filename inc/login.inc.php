<?php

if (isset($_POST['login'])) {
    //grabbing data
    $username = $_POST['username'];
    $password = $_POST['password'];
    //control

    include "../classes/dbh.class.php";
    include "../classes/login.class.php";
    include "../classes/login-controler.class.php";

    $login = new LoginController($username, $password);

    //runninng error check
    $login->loginUser();

    //action
    header("Location: ../index.php?error=none");
} else {
    //action
    header("Location: ../index.php?error=loginFirst");
}
