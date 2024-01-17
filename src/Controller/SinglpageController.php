<?php

namespace App\Controller;

use App\Controller;
use App\Models\Wiki;
class SinglpageController extends Controller
{
    function showWiki()
    {
        if (isset($_GET["idWiki"])) {

            $id = $_GET["idWiki"];
            $wikis = new Wiki;
            $wiki = $wikis->find($id);
            $this->render("/single_page", ["wiki"=>$wiki]);

        }
    }
}