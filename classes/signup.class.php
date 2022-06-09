<?php

class Signup extends Dbh
{
    protected function setUser($username, $password, $email)
    {
        $stmt = $this->conn()->prepare("INSERT INTO loginusers (username, password, email) VALUES (?, ?, ?)");
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($username, $hashedPwd, $email))) {
            $stmt = null;
            session_start();
            $_SESSION['msg'] = "stmt error";
            header('location: ../index.php?error=CantAddUser');
            exit();
        }
        $stmt = null;
    }

    protected function checkUser($username, $email)
    {

        $stmt = $this->conn()->prepare("SELECT id FROM loginusers WHERE username = ? OR email = ?;");

        if (!$stmt->execute(array($username, $email))) {
            $stmt = null;
            // $stmt->close(); //revisar si funciona despues
            session_start();
            $_SESSION['msg'] = "stmt error";
            header("Location: ../index.php?error=STMT_no_va");
            exit();
        }

        if ($stmt->rowCount() > 0) {
            $resultChech = false;
        } else {
            $resultChech = true;
        }
        return $resultChech;
    }
}
