<?php

namespace App\Models;

use PDO;

class Tag
{
    private $db;

    private int $tagID;
    private string $tagName;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getTagID(): int
        {
            return $this->tagID;
        }
    
        public function setTagID(int $tagID)
        {
            $this->tagID = $tagID;
        }
    
        public function getTagName(): string
        {
            return $this->tagName;
        }
    
        public function setTagName(string $tagName)
        {
            $this->tagName = $tagName;
        }
    public function addTag($data): bool
{
    try { 
        // Prepare and execute the SQL query to add a tag
        $query = "INSERT INTO tag (tagName) VALUES (?)";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$data['name']]);
        return true;
    } catch (\PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}

    public function showTag($tagID): array
    {
        try {
            // Prepare and execute the SQL query to select a tag by ID
            $query = "SELECT * FROM tag WHERE tagID = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$tagID]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function showAllTags(): array
    {
        try {
            // Prepare and execute the SQL query to select all tags
            $query = "SELECT * FROM tag";
            $stmt = $this->db->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function editTag($tagID, $data): bool
    {
        try {
            // Prepare and execute the SQL query to edit a tag by ID
            $query = "UPDATE tag SET tagName = ? WHERE tagID = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$data['name'], $tagID]);
            return true;
        } catch (\PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
    public function deleteTag($tagID): bool
    {
        try {
            // Prepare and execute the SQL query to delete a tag by ID
            $query = "DELETE FROM tag WHERE tagID = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$tagID]);
            return true;
        } catch (\PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
    public function getCount(): int
    {
        try {
            // Prepare and execute the SQL query to get the count of tags
            $query = "SELECT COUNT(*) as count FROM tag";
            $stmt = $this->db->query($query);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result['count'] ?? 0;
        } catch (\PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
}