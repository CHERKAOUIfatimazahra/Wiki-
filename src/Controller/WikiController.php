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

    public function find($wikiID)
    {
        $wiki = new Wiki();
        $title = isset($_POST["title"]) ? $_POST["title"] : "";
        $wikiData = $wiki->find($wikiID);
    }

    public function findbyId()
    {
        $wikiID = isset($_GET['wikiID']) ? $_GET['wikiID'] : null;

        $wiki = new Wiki();
        $wikiData = $wiki->find($wikiID);

        // Check if $wikiData is an array before using it
        if (is_array($wikiData)) {
            header('Content-Type: application/json');
            echo json_encode($wikiData);
        } else {
            // Return an error message as JSON
            header('Content-Type: application/json');
            echo json_encode(["error" => "No data found for wikiID: $wikiID"]);
        }
    }
    public function add(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $wiki = new Wiki();

            $title = isset($_POST["title"]) ? $_POST["title"] : "";
            $content = isset($_POST["content"]) ? $_POST["content"] : "";
            $categoryID = isset($_POST["categoryID"]) ? $_POST["categoryID"] : "";
            $tags = $_POST["tags"] ? $_POST["tags"] : "";
            $status = isset($_POST["status"]) ? $_POST["status"] : "Draft";
            $creationDate = isset($_POST["creationDate"]) ? $_POST["creationDate"] : "";

            $data = [$title, $content, $categoryID, $creationDate, $status];
            $wiki->create($data);
            $wiki_id = $wiki->getlastInsertedId();
            foreach ($tags as $tag_id) {
                if (!$wiki->createWiki_Tags([$tag_id, $wiki_id])) {
                    echo 'tag with id ' . $tags . ' not insert';
                }
            }
            header("Refresh:0; url=dashboard/wiki");

        }
    }
    public function edit($wikiID)
    {
        $wiki = new Wiki();
        $wikiData = $wiki->find($wikiID);

        $this->render('dashboard/edit_wiki', ['wiki' => $wikiData]);
    }
    public function update(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $wikiID = isset($_POST["wikiID"]) ? $_POST["wikiID"] : "";
            $title = isset($_POST["title"]) ? $_POST["title"] : "";
            $content = isset($_POST["content"]) ? $_POST["content"] : "";
            $categoryID = isset($_POST["categoryID"]) ? $_POST["categoryID"] : "";


            $data = [$title, $content, $categoryID];

            $wiki = new Wiki();
            $wiki->update($data);

            header("Refresh:0; url=dashboard/wiki");
        }
    }
    public function destroy(): void
    {
        $wikiID = isset($_POST["wikiIDDeletye"]) ? $_POST["wikiIDDeletye"] : "";
        $wiki = new Wiki();
        $wiki->dalete($wikiID);

        header("Refresh:0; url=dashboard/wiki");
    }
    function index(): void
    {
        $wiki = new Wiki();
        $category = new Category();
        $tag = new Tag();

        $categories = $category->showAllCategory();
        $tags = $tag->showAllTags();
       
        if($_SESSION['role'] == 1){
        
        $wikis = $wiki->showAll();
            } else if ($_SESSION['role'] ==2) {
                $wikis = $wiki->showAllAuthor();
            }
        $this->render("/dashboard/wiki", ['wikis' => $wikis, 'categories' => $categories, 'tags' => $tags]);
    }
    function archived()
    {
        if ($_SERVER["REQUEST_METHOD"]) {

            $wiki = new Wiki();
            if ($wiki->updateStatus(["id" => $_POST["id"], "status" => "Archived"])) {
                header("Location: " . $_SERVER['HTTP_REFERER']);

            } else
                echo "error";
        } else
            "no data ";
    }
    function published()
    {
        if ($_SERVER["REQUEST_METHOD"]) {

            $wiki = new Wiki();
            if ($wiki->updateStatus(["id" => $_POST["id"], "status" => "Published"])) {
                header("Location: " . $_SERVER['HTTP_REFERER']);

            }
            echo "error";
        } else
            "no data ";
    }

}