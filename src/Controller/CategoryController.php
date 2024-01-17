<?php

namespace App\Controller;

use App\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(): void
    {
        $category = new Category();
        $categories = $category->showAllCategory();

        $this->render("/dashboard/category", ['categories' => $categories]);
    }
    public function add(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $categoryName = isset($_POST["category"]) ? $_POST["category"] : "";
            $data = ['name' => $categoryName];

            $category = new Category();
            $category->addCategory($data);

            header("Refresh:0; url=dashboard/category");
        }
    }
    public function create(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = isset($_POST["name"]) ? $_POST["name"] : "";

            $category = new Category();
            $category->addCategory(['name' => $name]);

            header("Refresh:0; url=dashboard/category");
        }
    }
    public function destroy($categoryID): void
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $category = new Category();

            $category->delete($categoryID);
            header('Location: /dashboard/category');
        } else {
            echo "false";
        }
    }
    public function dc()
    {
        $category = new Category();
        $categorys = $category->showAllCategory();

        $this->render("/dashboard/category", ['categorys' => $categorys]);
    }

    public function update($categoryID): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = isset($_POST["name"]) ? $_POST["name"] : "";

            $category = new Category();
            $category->editCategory($categoryID, ['name' => $name]);

            header("Location: " . $_SERVER["HTTP_REFERER"]);

        }
    }
    public function edit($categoryID): void
    {
        $category = new Category();
        $categoryData = $category->showCategory($categoryID);

        if (!$categoryData) {
            
            return;
        }

        $this->render('dashboard/edit_category', ['category' => $categoryData]);
    }

}