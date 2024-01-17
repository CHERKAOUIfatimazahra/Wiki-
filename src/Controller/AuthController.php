<?php

namespace App\Controller;

use App\Controller;
use App\Models\User;

class AuthController extends Controller
{
    function login_url(): void
    {
        $this->render("login");
    }
    function register_url(): void
    {
        $this->render("register");
    }
    // function profile(): void
    // {
    //     $this->render("");
    // }

    function login(): void
    {

        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $password = isset($_POST["password"]) ? $_POST["password"] : "";
        $user_model = new User();
        $user = $user_model->login($email, $password);

        if ($user) {

            $_SESSION['idUser'] = $user['id'];
            $_SESSION['role'] = $user['role'];

            if ($_SESSION['role'] == 1) {
                header("Refresh:0; url=/dashboard");
            } elseif ($_SESSION['role'] == 2) {

                header("Refresh:0; url=/dashboard/wiki");
            }
        } else {
            $this->render("login", ["error" => "Invalid credentials"]);
        }
    }
    function register(): void
    {
        $name = isset($_POST["name"]) ? $_POST["name"] : "";
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $password = isset($_POST["password"]) ? $_POST["password"] : "";

        $user_model = new User();
        $user = $user_model->register($name, $email, $password, $role = 2);

        header("Refresh:0; url=login");
    }

    public function logout()
    {
        session_destroy();

        header("Refresh:0; url=login");
    }
}
