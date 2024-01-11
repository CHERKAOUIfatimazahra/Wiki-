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
        } else {
            // Handle non-POST requests or redirect accordingly
        }
    }
    public function create(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = isset($_POST["name"]) ? $_POST["name"] : "";

            $category = new Category();
            $category->addCategory(['name' => $name]);

            header("Refresh:0; url=dashboard/category");
        } else {
            // Handle non-POST requests or redirect accordingly
        }
    }

    public function destroy($categoryID): void
    {
        $category = new Category();
        $category->deleteCategory($categoryID);

        header("Refresh:0; url=dashboard/category");
    }

    public function update($categoryID): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = isset($_POST["name"]) ? $_POST["name"] : "";

            $category = new Category();
            $category->editCategory($categoryID, ['name' => $name]);

            header("Refresh:0; url=dashboard/category");
        } else {
            // Handle non-POST requests or redirect accordingly
        }
    }

    public function edit($categoryID): void
    {
        $category = new Category();
        $categoryData = $category->showCategory($categoryID);

        if (!$categoryData) {
            // Handle case where category with given $categoryID is not found
            // You may redirect or display an error message
            return;
        }

        $this->render('dashboard/edit_category', ['category' => $categoryData]);
    }
}