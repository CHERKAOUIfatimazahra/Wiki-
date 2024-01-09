<?php

namespace MVC\Model;

use MVC\connexion\connexion;
use MVC\interfaces\Crud as CrudInterface;
use PDO;

class Category
{
    private int $categoryID;
    private string $categoryName;

public function __construct(string $categoryName, int $categoryID)
{
    $this->categoryName = $categoryName;
    $this->categoryID = $categoryID;
}
public function getCategoryID() : int
{
    return $this->categoryID;
}
public function setCategoryID(int $categoryID)
{
    $this->categoryID = $categoryID;
}
public function getCategoryName() : string
{
    return $this->categoryName;
}
public function setCategoryName(string $categoryName)
{
    $this->categoryName = $categoryName;
}
public function add_category(){}
public function show(){}
public function showAllCategory(){}
public function edit(){}
}
