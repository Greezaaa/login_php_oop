<?php

class SignupController extends Signup
{

    private $username;
    private $password;
    private $repassword;
    private $email;

    public function __construct($username, $password, $repassword, $email)
    {

        $this->username = $username;
        $this->password = $password;
        $this->repassword = $repassword;
        $this->email = $email;
    }
    public function signupUser()
    {
        if ($this->emptyInput() == false) {
            //empty inputs
            session_start();
            $_SESSION['msg'] = "Empty inputs";
            header("Location: ../index.php");
            exit();
        }
        if ($this->invalidInput() == false) {
            //invalid inputs
            session_start();
            $_SESSION['msg'] = "invalid inputs";
            header("Location: ../index.php");
            exit();
        }
        if ($this->invalidEmail() == false) {
            //invalid email
            session_start();
            $_SESSION['msg'] = "invalid email";
            header("Location: ../index.php");
            exit();
        }
        if ($this->pwdMatch() == false) {
            //password dont match
            session_start();
            $_SESSION['msg'] = "Passwords do not match";
            header("Location: ../index.php");
            exit();
        }
        if ($this->checkUserE() == false) {
            //username or email allready  taken
            session_start();
            $_SESSION['msg'] = "User or email already taken";
            header("Location: ../index.php");
            exit();
        }
        $this->setUser($this->username, $this->password, $this->email);
        session_start();
        $_SESSION['msg'] = "User registered successfully";
    }

    private function emptyInput()
    {
        if (empty($this->username) || empty($this->password) || empty($this->email) || empty($this->repassword)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidInput()
    {
        if (!preg_match('/^[a-zA-Z0-]*$/', $this->username)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail()
    {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function pwdMatch()
    {
        if ($this->password !== $this->repassword) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function checkUserE()
    {
        if (!$this->checkUser($this->username, $this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}
