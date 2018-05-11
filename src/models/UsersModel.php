<?php

namespace App\Models;


class UsersModel
{
    protected $pdo;

    public function __construct()
    {
        $this->connect();
    }

    //Соединение с базой данный
    protected function connect()
    {
        // подключаем настройки базы данных
        $config = include(__DIR__ . DIRECTORY_SEPARATOR . 'config.php');
        $pdoConfig = (object)$config["db"];
        try {
            //Connect to MySQL using the PDO object.
            $this->pdo = new \PDO(  // обратный слеш говорит о глобальнои пространсте имен
                sprintf('mysql:host=%s;dbname=%s', $pdoConfig->host, $pdoConfig->dbname),
                $pdoConfig->username,
                $pdoConfig->password
            );
        } catch (PDOException $e) {
            echo "Error connect to database: " . $e->getMessage() . "\n";
            return null;
        }
    }


    public function userReg($data)
    {
        try {
            $prepare = $this->pdo->prepare('INSERT INTO users_data(login, password, name) VALUE (:login, :password, :name)');
            $prepare->execute(['login' => $data['login'], 'password' => $data['password'], 'name' => $data['name']]);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getUserLogin($login, $password)
    {
        $data = null;
        try {
            $prepare = $this->pdo->prepare('SELECT id, login, name FROM users_data WHERE login = :login AND password = :password');
            $prepare->execute(['login' => $login, 'password' => $password]);
            $data['user'] = $prepare->fetchAll(\PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        return $data;
    }

    public function userUpdate($id, $user_name)
    {
        try {
            $prepare = $this->pdo->prepare('UPDATE users_data SET name = :name WHERE id = :id');
            $prepare->execute(['name' => $user_name, 'id' => $id]);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}