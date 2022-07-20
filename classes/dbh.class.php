<?php
class Dbh
{
    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbName = "login";


    protected function conn()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        //trying to connect to DB if error -> catch error en print it
        try {
            $pdo = new PDO($dsn, $this->user, $this->pwd);
            // cambiamos idioma de datos al resibir desde la base de datos
            $pdo->query("SET NAMES 'utf8'");
            // Set the PDO error mode to exception
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        } catch (PDOException $e) {
            die("ERROR: Something went wrong... " . $e->getMessage());
        }
    }
}