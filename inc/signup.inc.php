<?php

if (isset($_POST['signup'])) {
    //grabbing data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $email = $_POST['email'];

    //control

    include "../classes/dbh.class.php";
    include "../classes/signup.class.php";
    include "../classes/signup-controler.class.php";

    $signup = new SignupController($username, $password, $repassword, $email);

    //runninng error check
    $signup->signupUser();

    //action
    header("Location: ../index.php");
}
