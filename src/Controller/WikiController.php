<?php

namespace App\Controller;

use App\Controller;
use App\Models\Wiki;

class WikiController extends Controller
{
    function index(): void
    {
        $this->render("/dashboard/wiki");
    }
    function create(): void
    {
        
    }
    function destroy($wikiID): void
    {
        $wiki = new Wiki; 
        $wiki->setWikiID($wikiID);
        $wiki->destroy();
    }
    function update(int $wikiID): void
    {

    }
    function wiki(): void
    {
        $wiki = new Wiki;
        $wikis = $wiki->showAll();
    }

    function add(): void
    {
        $wiki = new Wiki($_POST['title'], $_POST['content'], $_POST['categoryID'], $_POST['tagID'], $_POST['creationDate']);
        $wiki->add_wiki();
    }

    public function edit($wikiID): void
    {
        $wiki = new Wiki();
        $wiki->setWikiID($wikiID);
        $wikiData = $wiki->show();
    }

    function updat($wikiID): void
    {
        $wiki = new Wiki($_POST['title'], $_POST['content'], $_POST['categoryID'], $_POST['tagID'], $_POST['creationDate']);
        $wiki->edit(); 
        $wikis = new Wiki; 
    }
}