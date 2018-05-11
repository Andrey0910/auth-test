<?php

namespace App\Controllers;

use App\Models\UsersModel;

class RegController extends MainController
{
    public function index($nameView)
    {
        $_SESSION["user"] = null;
        $_SESSION["user_id"] = null;
        $_SESSION["user_name"] = null;
        $this->view->render($nameView);
    }

    public function reg()
    {
        $_SESSION["user_exist"] = 'no';
        $login = $_POST['login'];
        $password = $_POST['password'];
        $passwordRepeat = $_POST['passwordRepeat'];
        $name = $_POST['name'];
        if (empty($password) && empty($passwordRepeat)) {
            header("Location: /reg");
        }
        $_SESSION["passwordRepeat"] = "yes";
        if (!empty($login) && $password == $passwordRepeat) {
            $data = [
                'login' => $login,
                'password' => $password,
                'name' => $name
            ];
            $modelUsers = new UsersModel();
            $userExist = $modelUsers->getUserLogin($login, $password);
            if (!empty($userExist['user'][0]->id)) {
                $_SESSION["user_exist"] = 'yes';
                header("Location: /reg");
                return;
            }
            $modelUsers->userReg($data);
            $data = $modelUsers->getUserLogin($login, $password);
            $_SESSION["user_id"] = $data['user'][0]->id;
            $_SESSION["user"] = $login;
            $_SESSION["user_name"] = $name;
            header("Location: /list");
        } else {
            $_SESSION["passwordRepeat"] = "no";
            header("Location: /reg");
        }

    }
}