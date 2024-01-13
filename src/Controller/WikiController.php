<?php

namespace App\Controller;

use App\Controller;
use App\Models\Wiki;
use App\Models\Category;
use App\Models\Tag;

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
            $wiki = new Wiki();

            $title = isset($_POST["title"]) ? $_POST["title"] : "";
            $content = isset($_POST["content"]) ? $_POST["content"] : "";
            $categoryID = isset($_POST["categoryID"]) ? $_POST["categoryID"] : "";

            $tags = $_POST["tags"] ? $_POST["tags"] : "";
            $creationDate = isset($_POST["creationDate"]) ? $_POST["creationDate"] : "";
            $data = [$title, $content, $categoryID, $creationDate];
            $wiki->create($data);
            $wiki_id = $wiki->getlastInsertedId();
            foreach ($tags as $tag_id) {
                if (!$wiki->createWiki_Tags([$wiki_id, $tag_id])) {
                    echo 'tag with id ' . $tags . ' not insert';
                }
            }

            header("Refresh:0; url=dashboard/wiki");


        } else {
            // Handle non-POST requests or redirect accordingly
        }
    }
    public function edit($wikiID)
    {
        $wiki = new Wiki();
        $wikiData = $wiki->find($wikiID);

        if (!$wikiData) {
            // Handle case where user with given $id is not found
            // You may redirect or display an error message
            return;
        }

        $this->render('dashboard/edit_wiki', ['wiki' => $wikiData]);
    }
    public function update($wikiID): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = isset($_POST["title"]) ? $_POST["title"] : "";
            $content = isset($_POST["content"]) ? $_POST["content"] : "";
            $categoryID = isset($_POST["categoryID"]) ? $_POST["categoryID"] : "";
            $tagID = isset($_POST["tagID"]) ? $_POST["tagID"] : "";
            $creationDate = isset($_POST["creationDate"]) ? $_POST["creationDate"] : "";
            $data = [$title, $content, $categoryID, $tagID, $creationDate];

            $wiki = new Wiki();
            $wiki->update($wikiID, $data);

            header("Refresh:0; url=dashboard");
        } else {
            // Handle non-POST requests or redirect accordingly
        }
    }
    // public function destroy($wikiID): void
    // {
    //     // dump($_SERVER['REQUEST_METHOD']);die();
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //     $user = new Wiki();
    //     $user->delete($wikiID);
    //     header('Location: dashboard');
    //     }else {
    //         echo "false";
    //     }
    // $delete_result  = $user;



    // }

    function index(): void
    {
        $wikis = new Wiki();
        $category = new Category();
        $categories = $category->showAllCategory();

        $tag = new Tag();
        $tags = $tag->showAllTags();
        $this->render("/dashboard/wiki", ['wikis' => $wikis, 'categories' => $categories, 'tags' => $tags]);
    }
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