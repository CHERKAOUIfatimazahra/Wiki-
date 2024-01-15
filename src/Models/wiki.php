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
    public function getTitle(): string
    {
        return $this->title;
    }
    public function setTitle(string $title)
    {
        $this->title = $title;
    }
    public function getCategoryID(): int
    {
        return $this->categoryID;
    }
    public function setCategoryID(int $categoryID)
    {
        $this->categoryID = $categoryID;
    }
    public function getCreationDate(): string
    {
        return $this->creationDate;
    }
    public function setCreationDate(string $creationDate)
    {
        $this->creationDate = $creationDate;
    }
    public function showAll()
{
    try {
        // Prepare and execute the SQL query to select all wikis with tags and category
        $query = "SELECT wiki.*, GROUP_CONCAT(DISTINCT tag.tagName) AS tags, category.categoryName
                  FROM wiki
                  LEFT JOIN wikiTags ON wiki.wikiID = wikiTags.wiki_id
                  LEFT JOIN tag ON wikiTags.tag_id = tag.tagID
                  LEFT JOIN category ON wiki.categoryID = category.categoryID
                  GROUP BY wiki.wikiID";

        $statement = $this->db->query($query);
        $wikis = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $wikis;
    } catch (\PDOException $e) {
        // Handle the exception
        die("Error: " . $e->getMessage());
    }
}

    
    public function create($data)
    {
        $stmt = $this->db->prepare("INSERT INTO wiki (title,content,categoryID,creationDate) VALUES (?, ?, ?, ?)");
        $stmt->execute($data);
        return $stmt;
    }

    
    public function find($wikiID)
{
    
    try {
        $query = "SELECT * FROM wiki WHERE wikiID = ?";
        $statement = $this->db->prepare($query);
        $statement->execute([$wikiID]); // Pass the parameter directly as an array

        // Fetch the user as an associative array
        $wiki = $statement->fetch(PDO::FETCH_ASSOC);

        return $wiki;
    } catch (\PDOException $e) {
        // Handle the exception
        die("Error: " . $e->getMessage());
    }
}

    public function update($data)
    {
        try {
            // Prepare and execute the SQL query to update a user by ID
            $query = "UPDATE wiki SET title = ?, content = ?, categoryID = ?, creationDate = ? WHERE wikiID = ?";
            $statement = $this->db->prepare($query);
            
            $statement->execute($data);

            return $statement;
        } catch (\PDOException $e) {
            // Handle the exception
            die("Error: " . $e->getMessage());
        }
    }


    public function createWiki_Tags($data)
    {
        $stmt = $this->db->prepare("INSERT INTO wikiTags (tag_id,wiki_id) VALUES (?, ?)");
        $stmt->execute($data);
        return $stmt;
    }


    public function getlastInsertedId(){
        return $this->db->lastInsertId();
    }

    // public function addWiki($data)
// {
//     try { 
//         // Prepare and execute the SQL query to add a tag
//         $query = "INSERT INTO wiki (title,content,categoryID,tagID,creationDate) VALUES (?,?,?,?,?)";
//         $stmt = $this->db->prepare($query);
//         $stmt->bindParam(1, $title);
//         $stmt->bindParam(2, $content);
//         $stmt->bindParam(3, $categoryID);
//         $stmt->bindParam(4, $tagID);
//         $stmt->bindParam(5, $creationDate);

    //         $stmt->execute([$data['name']]);
//         return true;
//     } catch (\PDOException $e) {
//         die("Error: " . $e->getMessage());
//     }
// }

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
    public function dalete($wikiID): bool
    {
        try {
            $query = "DELETE FROM wiki WHERE wikiID = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$wikiID]);
            return true;
        } catch (\PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
}