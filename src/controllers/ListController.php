<?php

namespace App\Controllers;

use App\Models\UsersModel;


class ListController extends MainController
{
    public function index($nameView)
    {
        $this->view->render($nameView);
    }

    public function update()
    {
        $id = $_SESSION["user_id"];
        $user_name = $_POST['name'];
        $modelUsers = new UsersModel();
        $modelUsers->userUpdate($id, $user_name);
        $_SESSION["user_name"] = $user_name;
        header("Location: /list");
    }
}