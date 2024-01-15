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
            // Return the data as JSON
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
    public function update(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $wikiID = isset($_POST["wikiID"]) ? $_POST["wikiID"] : "";
            $title = isset($_POST["title"]) ? $_POST["title"] : "";
            $content = isset($_POST["content"]) ? $_POST["content"] : "";
            $categoryID = isset($_POST["categoryID"]) ? $_POST["categoryID"] : "";
            $creationDate = isset($_POST["creationDate"]) ? $_POST["creationDate"] : "";
            $data = [$title, $content, $categoryID, $creationDate, $wikiID];$status = isset($_POST["status"]) ? $_POST["status"] : "Draft";
            $creationDate = isset($_POST["creationDate"]) ? $_POST["creationDate"] : "";

            $data = [$title, $content, $categoryID, $creationDate, $status];

            $wiki = new Wiki();
            $wiki->update($data);

            header("Refresh:0; url=dashboard/wiki");
        } else {
            // Handle non-POST requests or redirect accordingly
        }
    }

    public function destroy(): void
    {
        // dump($_SERVER['REQUEST_METHOD']);die();
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
        $wikis = $wiki->showAll();

        $this->render("/dashboard/wiki", ['wikis' => $wikis, 'categories' => $categories, 'tags' => $tags]);
    }

}