<?php

namespace App\Controller;

use App\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function getAllUser()
    {
        $user = new User();
        $users = $user->showAll();
        $this->render('dashboard/user_dashboard', ['users' => $users]);
    }
    public function dh()
    {
        $user = new User();
        $users = $user->showAll();
        $this->render('dashboard/user_dashboard', ['users' => $users]);
    }
 
    public function add(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = isset($_POST["name"]) ? $_POST["name"] : "";
            $email = isset($_POST["email"]) ? $_POST["email"] : "";
            $password = isset($_POST["password"]) ? $_POST["password"] : "";
            $role = isset($_POST["role"]) ? $_POST["role"] : "";
            $data = [$name, $email, $password, $role];

            $user = new User();
            $user->create($data);

            header("Refresh:0; url=dashboard");
        } else {
            // Handle non-POST requests or redirect accordingly
        }
    }

    public function edit($id): void
    {
        $user = new User();
        $userData = $user->find($id);

        if (!$userData) {
            // Handle case where user with given $id is not found
            // You may redirect or display an error message
            return;
        }

        $this->render('dashboard/edit_user', ['user' => $userData]);
    }

    public function update($id): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = isset($_POST["name"]) ? $_POST["name"] : "";
            $email = isset($_POST["email"]) ? $_POST["email"] : "";
            $password = isset($_POST["password"]) ? $_POST["password"] : "";
            $role = isset($_POST["role"]) ? $_POST["role"] : "";
            $data = [$name, $email, $password, $role];

            $user = new User();
            $user->update($id, $data);

            header("Refresh:0; url=dashboard");
        } else {
            // Handle non-POST requests or redirect accordingly
        }
    }

    public function destroy($id): void
    {
        // dump($_SERVER['REQUEST_METHOD']);die();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user = new User();
        $user->delete($id);
        header('Location: /dashboard');
        }else {
            echo "false";
        }
        // $delete_result  = $user;
        
        
        
    }
}