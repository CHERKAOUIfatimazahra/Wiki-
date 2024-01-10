<?php

namespace MVC\Controller;

use MVC\Controller;
use MVC\Model\User;

class UserController extends Controller
{
    public function getAllUser()
    {
        $user = new User;
        $users = $user->showAll();
        $this->render('dashboard',['user' => $users]);
    }
    public function add(): void
    {
            $name = isset($_POST["username"]) ? $_POST["username"] : "";
            $email = isset($_POST["email"]) ? $_POST["email"] : "";
            $password = isset($_POST["password"]) ? $_POST["password"] : "";
            $role = isset($_POST["role"]) ? $_POST["role"] : "";

            return $this->render('user', ['username' => $name]);
    }
    public function edit($id): void
    {
        $user = new User();
        $user->setId($id);
        $userData = $user->show();
    }
    public function update($id): void
    {
        $user = new User($_POST['username'], $_POST['email'], $_POST['password'], $_POST['roleID']);
        $user->edit(); 
        $user = new User; 
    }
    public function destroy($id): void
    {
        $user = new User;
        $user->setId($id);
        $user->destroy();
    }
}