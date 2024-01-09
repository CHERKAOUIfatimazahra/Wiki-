<?php

namespace MVC\Model;

use MVC\connexion\connexion;
use MVC\interfaces\Crud as CrudInterface;
use PDO;

class Tag
{
    private int $tagID;
    private string $tagName;

public function __construct(string $tagName, int $tagID)
{
    $this->tagID = $tagID;
    $this->tagName = $tagName;
}
public function getTagID():int
{
    return $this->tagID;
}
public function setTagID(int $tagID)
{
    $this->tagID = $tagID;
}
public function getTagName():string
{
    return $this->tagName;
}
public function setTagName(string $tagName)
{
    $this->tagName = $tagName;
}
public function add_tag(){}
public function show(){}
public function showAllTags(){}
public function edit(){}

}
