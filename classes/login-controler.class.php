<?php

class LoginController extends Login
{

    private $username;
    private $password;

    public function __construct($username, $password)
    {

        $this->username = $username;
        $this->password = $password;
    }
    public function loginUser()
    {
        if ($this->emptyInput() == false) {
            //empty inputs
            session_start();
            $_SESSION['msg'] = "Empty inputs";
            header("Location: ../index.php?error=emptyInputs");
            exit();
        }
        $this->getUser($this->username, $this->password);
    }

    private function emptyInput()
    {
        if (empty($this->username) || empty($this->password)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}
