<?php

namespace App\Controller;

use App\Controller;
use App\Models\Tag;

class TagController extends Controller
{
    public function index(): void
    {
        $tag = new Tag();
        $tags = $tag->showAllTags();
        $this->render('/dashboard/tag', ['tags' => $tags]);
    }

    public function add(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $tagName = isset($_POST["tagName"]) ? $_POST["tagName"] : "";
            $tagID = isset($_POST["tagID"]) ? $_POST["tagID"] : "";
            $data = ['name' => $tagName];

            $tag = new Tag();
            $tag->addTag($data);

            header("Refresh:0; url=dashboard/tag"); 
        } else {
            // error message
        }
    }

    public function edit($id): void
    {
        $tag = new Tag();
        $tagData = $tag->showTag($id);

        if (!$tagData) {
            // error message
            return;
        }

        $this->render('dashboard/edit_tag', ['tag' => $tagData]);
    }

    public function update($id): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tagName = isset($_POST["tagName"]) ? $_POST["tagName"] : "";
            $tagID = isset($_POST["tagID"]) ? $_POST["tagID"] : "";
            $data = [$tagName, $tagID];

            $tag = new Tag();
            $tag->editTag($id, $data);  

            header("Refresh:0; url=dashboard/tag"); 
        } else {
            // error message
        }
    }

    public function destroy($id): void
    {
        $tag = new Tag();
        $tag->deleteTag($id);  

        header("Refresh:0; url=dashboard/tag"); 
    }
}