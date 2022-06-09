<?php

class Login extends Dbh
{

    protected function getUser($username, $password)
    {
        $stmt = $this->conn()->prepare("SELECT password FROM loginusers WHERE username = ? OR email = ?;");

        if (!$stmt->execute(array($username, $username))) {
            $stmt = null;
            session_start();
            $_SESSION['msg'] = "stmt Error";
            header("location: ../index.php");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            session_start();
            $_SESSION['msg'] = "User not founded";
            header("location: ../index.php");
            exit();
        }

        $passwordHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($password, $passwordHashed[0]["password"]);

        if ($checkPwd == false) {
            $stmt = null;
            session_start();
            $_SESSION['msg'] = "Wrong password";
            header("location: ../index.php");
            exit();
        } elseif ($checkPwd == true) {
            $stmt = $this->conn()->prepare('SELECT * FROM loginusers WHERE (username = ? OR email = ?) AND password = ?;');

            if (!$stmt->execute(array($username, $username, $passwordHashed[0]["password"]))) {
                $stmt = null;
                session_start();
                $_SESSION['msg'] = "stmt Error";
                header("location: ../index.php");
                exit();
            }

            if ($stmt->rowCount() == 0) {
                $stmt = null;
                session_start();
                $_SESSION['msg'] = "username or email and password not match";
                header("location: ../index.php");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION['msg'] = "Welcome a board " . ucfirst($user[0]["username"]);
            $_SESSION["userid"] = $user[0]["id"];
            $_SESSION["username"] = $user[0]["username"];

            $stmt = null;
        }
    }
}
