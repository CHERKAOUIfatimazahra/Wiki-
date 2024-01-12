<?php

namespace App\Models;

use PDO;

class Wiki
{
    private $db;

    private int $wikiID;
    private string $title;
    private string $content;
    private int $categoryID;
    private int $tagID;
    private string $creationDate;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
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

public function addWiki($data): bool
{
    try { 
        // Prepare and execute the SQL query to add a tag
        $query = "INSERT INTO wiki (title,content,categoryID,tagID,creationDate) VALUES (?,?,?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(1, $title);
        $stmt->bindParam(2, $content);
        $stmt->bindParam(3, $categoryID);
        $stmt->bindParam(4, $tagID);
        $stmt->bindParam(5, $creationDate);

        $stmt->execute([$data['name']]);
        return true;
    } catch (\PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}

    // public function showTag($tagID): array
    // {
    //     try {
    //         // Prepare and execute the SQL query to select a tag by ID
    //         $query = "SELECT * FROM tag WHERE tagID = ?";
    //         $stmt = $this->db->prepare($query);
    //         $stmt->execute([$tagID]);
    //         return $stmt->fetch(PDO::FETCH_ASSOC);
    //     } catch (\PDOException $e) {
    //         die("Error: " . $e->getMessage());
    //     }
    // }

    // public function showAllTags(): array
    // {
    //     try {
    //         // Prepare and execute the SQL query to select all tags
    //         $query = "SELECT * FROM tag";
    //         $stmt = $this->db->query($query);
    //         return $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     } catch (\PDOException $e) {
    //         die("Error: " . $e->getMessage());
    //     }
    // }

    // public function editTag($tagID, $data): bool
    // {
    //     try {
    //         // Prepare and execute the SQL query to edit a tag by ID
    //         $query = "UPDATE tag SET tagName = ? WHERE tagID = ?";
    //         $stmt = $this->db->prepare($query);
    //         $stmt->execute([$data['name'], $tagID]);
    //         return true;
    //     } catch (\PDOException $e) {
    //         die("Error: " . $e->getMessage());
    //     }
    // }
    // public function deleteTag($tagID): bool
    // {
    //     try {
    //         // Prepare and execute the SQL query to delete a tag by ID
    //         $query = "DELETE FROM tag WHERE tagID = ?";
    //         $stmt = $this->db->prepare($query);
    //         $stmt->execute([$tagID]);
    //         return true;
    //     } catch (\PDOException $e) {
    //         die("Error: " . $e->getMessage());
    //     }
    // }
}