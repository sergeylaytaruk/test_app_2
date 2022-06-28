<?php

namespace components;

use db\MyDb;

class Login
{
    private $login;
    private $password;

    public function __construct($login, $password)
    {
        $this->login = trim($login);
        $this->password = trim($password);
        if (empty($this->login) && empty($this->password)) {
            throw new \Exception("WOW, something strange happened. ERROR");
        }
    }

    public function login()
    {
        try {
            $password = $this->cryptPassword($this->password);
            (new MyDb())->login($this->login, $password);
            (new \Redirect('index'))->redirect();
        } catch (\Throwable $ex) {
            var_dump($ex->getMessage());
            exit();
        }
    }

    public function registr()
    {
        try {
            $password = $this->cryptPassword($this->password);
            (new MyDb())->registr($this->login, $password);
            (new \Redirect('login'))->redirect();
        } catch (\Throwable $ex) {
            var_dump($ex->getMessage());
            exit();
        }
    }

    public function cryptPassword($password)
    {
        return md5($password);
    }
}
