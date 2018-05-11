<?php

namespace App\Controllers;

use App\Models\UsersModel;

class AuthorizationController extends MainController
{
    public function index($nameView)
    {
        $_SESSION["user"] = null;
        $_SESSION["user_id"] = null;
        $_SESSION["user_name"] = null;
        if ($nameView == 'authorization') {
            $this->view->render('authorization');
        } elseif ($nameView == 'reg') {
            $this->view->render('reg');
        }
    }

    public function authorization()
    {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $modelUsers = new UsersModel();
        $data = $modelUsers->getUserLogin($login, $password);
        if (empty($data)) {
            $this->redirect("/reg");
            return;
        }
        $_SESSION["user_id"] = $data['user'][0]->id;
        $_SESSION["user"] = $data['user'][0]->login;
        $_SESSION["user_name"] = $data['user'][0]->name;
        $this->redirect("/list");
    }

    public function logout()
    {
        $_SESSION["user"] = null;
        $_SESSION["user_id"] = null;
        $_SESSION["user_name"] = null;
        header("Location: /authorization");
    }
}