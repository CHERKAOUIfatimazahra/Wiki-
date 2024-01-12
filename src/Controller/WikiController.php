<?php

namespace App\Controller;

use App\Controller;
use App\Models\Wiki;

class WikiController extends Controller
{
    public function getAllWiki()
    {
        $wiki = new Wiki();
        $wikis = $wiki->showAll();
        $this->render('dashboard/wiki', ['wiki' => $wikis]);
    }

    public function add(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = isset($_POST["title"]) ? $_POST["title"] : "";
            $content = isset($_POST["content"]) ? $_POST["content"] : "";
            $categoryID = isset($_POST["categoryID"]) ? $_POST["categoryID"] : "";
            $tagID = isset($_POST["tagID"]) ? $_POST["tagID"] : "";
            $creationDate = isset($_POST["creationDate"]) ? $_POST["creationDate"] : "";
            $data = [$title, $content, $categoryID, $tagID, $creationDate];

            $wiki = new Wiki();
            $wiki->create($data);

            header("Refresh:0; url=dashboard");
        } else {
            // Handle non-POST requests or redirect accordingly
        }
    }

    // function index(): void
    // {
    //     $this->render("/dashboard/wiki");
    // }
    // function create(): void
    // {
        
    // }
    // function destroy($wikiID): void
    // {
    //     $wiki = new Wiki; 
    //     $wiki->setWikiID($wikiID);
    //     $wiki->destroy();
    // }
    // function update(int $wikiID): void
    // {

    // }
    // function wiki(): void
    // {
    //     $wiki = new Wiki;
    //     $wikis = $wiki->showAll();
    // }

    // function add(): void
    // {
    //     $wiki = new Wiki($_POST['title'], $_POST['content'], $_POST['categoryID'], $_POST['tagID'], $_POST['creationDate']);
    //     $wiki->add_wiki();
    // }

    // public function edit($wikiID): void
    // {
    //     $wiki = new Wiki();
    //     $wiki->setWikiID($wikiID);
    //     $wikiData = $wiki->show();
    // }

    // function updat($wikiID): void
    // {
    //     $wiki = new Wiki($_POST['title'], $_POST['content'], $_POST['categoryID'], $_POST['tagID'], $_POST['creationDate']);
    //     $wiki->edit(); 
    //     $wikis = new Wiki; 
    // }
}