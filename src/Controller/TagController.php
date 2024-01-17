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
        }
    }

    public function edit($tagID): void
    {
        $tag = new Tag();
        $tagData = $tag->showTag($tagID);

        $this->render('dashboard/edit_tag', ['tag' => $tagData]);
    }
    public function update($tagID): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = isset($_POST["tagName"]) ? $_POST["tagName"] : "";

            $tagName = new Tag();
            $tagName->editTag($tagID, ['tagName' => $name]);
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
    public function destroy($id): void
    {

        $tag = new Tag();
        $tag->deleteTag($id);

        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}