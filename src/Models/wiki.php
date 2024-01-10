<?php

namespace MVC\Model;

use MVC\connexion\connexion;
use MVC\interfaces\Crud as CrudInterface;
use MVC\Model\Crud as CrudAlias;
use PDO;

class Wiki extends CrudAlias
{
    private int $wikiID;
    private string $title;
    private string $content;
    private int $categoryID;
    private int $tagID;
    private string $creationDate;
public function __construct(string $title="", string $content="", int $categoryID=0, int $tagID=0, string $creationDate="", int $wikiID=0)
{
    $this->title = $title;
    $this->content = $content;
    $this->categoryID = $categoryID;
    $this->tagID = $tagID;
    $this->creationDate = $creationDate;
    $this->wikiID = $wikiID;
}
public function getWikiID(): int
{
    return $this->wikiID;
}
public function setWikiID(int $wikiID)
{
    $this->wikiID = $wikiID;
}
public function getTitle() : string
{
    return $this->title;
}
public function setTitle(string $title)
{
    $this->title = $title;
}
public function getCategoryID():int
{
    return $this->categoryID;
}
public function setCategoryID(int $categoryID)
{
    $this->categoryID = $categoryID;
}
public function getTagID():int
{
    return $this->tagID;
}
public function setTagID(int $tagID)
{
    $this->TagID = $tagID;
}
public function getCreationDate() : string
{
    return $this->creationDate;
}
public function setCreationDate(string $creationDate)
{
    $this->creationDate = $creationDate;
}
//model
public function edit():void{
    $this->update('wiki', $this->wikiID, ['title' => $this->title,'content' => $this->content,'categoryID'=> $this->categoryID,'tagID'=>$this->tagID,'creationDate'=>$this->creationDate]);
}
public function add_wiki(): void
{
    $this->wikiID = $this->insert('wiki',['title' => $this->title,'content' => $this->content,'categoryID'=> $this->categoryID,'tagID'=>$this->tagID,'creationDate'=>$this->creationDate]); 
}

public function destroy():void{
    $this->delete('wiki', $this->wikiID);
}

public function show(): object
{
    return $this->select('wiki', $this->wikiID);
  
}
public function showAll(): array
{
    return $this->selectAll('wiki');
}

}