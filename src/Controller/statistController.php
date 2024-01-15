<?php

namespace App\Controller;

use App\Controller;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use App\Models\Wiki;

class DashController extends Controller
{
    public function index()
    { 
        $categoryModel = new Category();
        $tagModel = new Tag();
        $userModel = new User();
        $wikiModel = new Wiki();

        // Fetch counts
        $categoryCount = $categoryModel->getCount();
        $tagCount = $tagModel->getCount();
        $userCount = $userModel->getCount();
        $wikiCount = $wikiModel->getCount();

        // Pass the data to the view
        $this->render("dashboard/user_dashboard", [
            'categoryCount' => $categoryCount,
            'tagCount' => $tagCount,
            'userCount' => $userCount,
            'wikiCount' => $wikiCount,
        ]);
    }
}