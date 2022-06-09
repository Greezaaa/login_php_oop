<?php

class Login extends Dbh
{

    protected function getUser($username, $password)
    {
        $stmt = $this->conn()->prepare("SELECT password FROM loginusers WHERE username = ? OR email = ?;");

        if (!$stmt->execute(array($username, $password))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        $passwordHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($password, $passwordHashed[0]["password"]);

        if ($checkPwd == false) {
            $stmt = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        } elseif ($checkPwd == true) {
            $stmt = $this->conn()->prepare('SELECT * FROM loginusers WHERE username = ? OR email = ? AND password = ?;');

            if (!$stmt->execute(array($username, $username, $password))) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../index.php?error=usernotfound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["userid"] = $user[0]["id"];
            $_SESSION["username"] = $user[0]["username"];

            $stmt = null;
        }
    }
}
