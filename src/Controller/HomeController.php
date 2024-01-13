<?php
namespace App\Controller;

use App\Controller;

// use App\Controller\Controller;
class HomeController extends Controller
{
    public function login()
    {
        $this->render('login');
    }
    public function register()
    {
        $this->render('register');
    }
    public function index()
    {

        $this->render('home');
    }

}