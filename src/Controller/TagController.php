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
        $this->render('dashboard/tag_dashboard', ['tags' => $tags]);
    }

    public function add(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Assuming your form fields are named appropriately
            $tagName = isset($_POST["tagName"]) ? $_POST["tagName"] : "";
            $tagID = isset($_POST["tagID"]) ? $_POST["tagID"] : "";
            $data = [$tagName, $tagID];

            $tag = new Tag();
            $tag->addTag($data);

            header("Refresh:0; url=dashboard/tag"); // Adjust the URL as needed
        } else {
            // Handle non-POST requests or redirect accordingly
        }
    }

    public function edit($id): void
    {
        $tag = new Tag();
        $tagData = $tag->find($id);

        if (!$tagData) {
            // Handle case where tag with given $id is not found
            // You may redirect or display an error message
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
            $tag->editTag($id, $data);  // Change updateTag to editTag

            header("Refresh:0; url=dashboard/tag"); // Adjust the URL as needed
        } else {
            // Handle non-POST requests or redirect accordingly
        }
    }

    public function destroy($id): void
    {
        $tag = new Tag();
        $tag->deleteTag($id);   // Add this line to call deleteTag method

        header("Refresh:0; url=dashboard/tag"); // Adjust the URL as needed
    }
}