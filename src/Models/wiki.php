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
            die("Error: " . $e->getMessage());
        }
    }
    public function showAllAuthor()
    {
        try {
              $isUser =    $_SESSION["idUser"];
            $query = "SELECT wiki.*, GROUP_CONCAT(DISTINCT tag.tagName) AS tags, category.categoryName
                  FROM wiki
                  LEFT JOIN wikiTags ON wiki.wikiID = wikiTags.wiki_id
                  LEFT JOIN tag ON wikiTags.tag_id = tag.tagID
                  LEFT JOIN category ON wiki.categoryID = category.categoryID
                  WHERE  userId  =  $isUser
                  GROUP BY wiki.wikiID";

            $statement = $this->db->query($query);
            $wikis = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $wikis;
        } catch (\PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
    public function create($data)
    { 
        
unset($data[4]);
unset($data[3]);

$id = $_SESSION["idUser"];

$sql = "INSERT INTO wiki (title, content, categoryID, userId) VALUES (?, ?, ?, ?)";

$stmt = $this->db->prepare($sql);

$stmt->bindParam(1, $data[0], PDO::PARAM_STR);
$stmt->bindParam(2, $data[1], PDO::PARAM_STR);
$stmt->bindParam(3, $data[2], PDO::PARAM_INT);
$stmt->bindParam(4, $id, PDO::PARAM_INT);

$stmt->execute();


    }
    public function find($wikiID)
    {
        try {
            $query = "SELECT wiki.*, GROUP_CONCAT(DISTINCT tag.tagName) AS tags, category.categoryName
                      FROM wiki
                      LEFT JOIN wikiTags ON wiki.wikiID = wikiTags.wiki_id
                      LEFT JOIN tag ON wikiTags.tag_id = tag.tagID
                      LEFT JOIN category ON wiki.categoryID = category.categoryID
                      WHERE wikiID = ?
                      GROUP BY wiki.wikiID" ;
            $statement = $this->db->prepare($query);
            $statement->execute([$wikiID]);

            $wiki = $statement->fetch(PDO::FETCH_ASSOC);

            return $wiki;
        } catch (\PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function update($data)
    {
        try {
            $query = "UPDATE wiki SET title = ?, content = ?, categoryID = ?, tagID = ? WHERE wikiID = ?";
            $statement = $this->db->prepare($query);

            $statement->execute($data);

            return $statement;
        } catch (\PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
    public function updateStatus(array $data)
    {
        try {
            $status = $data["status"];
            $wikiID = $data["id"];
            $wikiID += 0;
            $query = "UPDATE `wiki` SET status = :status WHERE wikiID = :wikiID";
            $statement = $this->db->prepare($query);

            $statement->bindParam(':status', $status, PDO::PARAM_STR);
            $statement->bindParam(':wikiID', $wikiID, PDO::PARAM_INT);

            $statement->execute();

            return $statement;
        } catch (\PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function createWiki_Tags($data)
    {
        $stmt = $this->db->prepare("INSERT INTO wikiTags (tag_id,wiki_id) VALUES (?, ?)");
        $stmt->execute($data);
        return $stmt;
    }

    public function getlastInsertedId()
    {
        return $this->db->lastInsertId();
    }

    function seacrhByTitle ($title) {
        try {
            $query = "SELECT wiki.*, GROUP_CONCAT(DISTINCT tag.tagName) AS tags, category.categoryName
                      FROM wiki
                      LEFT JOIN wikiTags ON wiki.wikiID = wikiTags.wiki_id
                      LEFT JOIN tag ON wikiTags.tag_id = tag.tagID
                      LEFT JOIN category ON wiki.categoryID = category.categoryID
                      WHERE wiki.title LIKE '%$title%'
                      GROUP BY wiki.wikiID";
        
            $statement = $this->db->prepare($query);
        
            $statement->execute();
        
            $wikis = $statement->fetchAll(PDO::FETCH_ASSOC);
        
            return $wikis;
        } catch (\PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }        

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