<?php

namespace db;

class MyDb
{
    private $pdo = null;
    public function __construct()
    {
        $host = 'mysql';
        $db   = 'blogdb';
        $user = 'root';
        $pass = '123456';
        $port = "3306";
        $charset = 'utf8';

        $options = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
        try {
            $this->pdo = new \PDO($dsn, $user, $pass, $options);
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function registr($login, $password)
    {
        try {
            $data = [
                'login' => $login,
                'password' => $password,
            ];
            $sql = "INSERT INTO users (login, password) VALUES (:login, :password)";
            $stmt= $this->pdo->prepare($sql);
            $stmt->execute($data);
        } catch (\Throwable $ex) {
            throw new \Exception("Ошибка регистрации");
        }
    }

    public function login($login, $password)
    {
        try {
            $data = [
                'login' => $login,
                'password' => $password,
            ];
            $sql = "SELECT id FROM users WHERE login=:login AND password=:password";
            $stmt= $this->pdo->prepare($sql);
            $stmt->execute($data);
            $idUser = $stmt->fetchColumn();
            if ($idUser > 0) {
                $_SESSION['id_user'] = $idUser;
            } else {
                throw new \Exception("Ошибка авторизации");
            }
        } catch (\Throwable $ex) {
            throw new \Exception("Ошибка логина ".$ex->getMessage() . $ex->getLine());
        }
    }

    public function getLastIArticles()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM articles ORDER BY id DESC LIMIT 10");
            $stmt->execute();
            $response = $stmt->fetchAll();
            $data = [
                'data' => $response,
            ];
            return $data;
        } catch (\Throwable $ex) {
            var_dump(['message' => $ex->getMessage()]);
        }
    }

    public function getAllArticles()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM articles ORDER BY id DESC");
            $stmt->execute();
            $response = $stmt->fetchAll();
            $data = [
                'data' => $response,
            ];
            return $data;
        } catch (\Throwable $ex) {
            echo json_encode(['message' => $ex->getMessage()]);
        }
    }

    public function addItem($title, $text, $idUser)
    {
        try {
            $data = [
                'title' => $title,
                'text' => $text,
                'id_user' => $idUser,
            ];
            $sql = "INSERT INTO articles (title, text, id_user) VALUES (:title, :text, :id_user)";
            $stmt= $this->pdo->prepare($sql);
            $stmt->execute($data);
        } catch (\Throwable $ex) {
            echo json_encode(['message' => $ex->getMessage()]);
        }
    }

    public function search($search)
    {
        $data = [
            'search' => "%" . $search . "%",
        ];
        $sql = "SELECT * FROM articles WHERE title LIKE :search ";
        $stmt= $this->pdo->prepare($sql);
        $stmt->execute($data);
        $response = $stmt->fetchAll();
        $data = [
            'data' => $response,
        ];
        return $data;

    }

}