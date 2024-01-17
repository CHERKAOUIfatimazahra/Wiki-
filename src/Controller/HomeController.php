<?php
namespace App\Controller;

use App\Models\Wiki;
use App\Controller;
use App\Models\Category;

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
        $wiki = new Wiki();
        $wikis = $wiki->showAll();
        $categories = new Category;
        $category = $categories->showAllCategory();

        $this->render('home', ['wikis' => $wikis, "category" => $category]);
    }

}