<?php
namespace App\Controller;
use App\Controller;
use App\Models\Wiki;
class SearchController extends Controller  {
      function index(){
           if(isset($_POST["search"])){
            $wiki = new Wiki();
            $wikis = $wiki->seacrhByTitle($_POST["search"]); 
            $this->render('search', ['wikis' => $wikis]);
           }
      }
}