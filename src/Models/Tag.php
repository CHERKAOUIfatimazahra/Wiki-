<?php

namespace App\Models;

use PDO;

class Tag
{
    private $db;

    public function __construct()
    {
        // Assuming you have a Database class that provides a PDO connection
        $this->db = Database::getInstance()->getConnection();
    }

    public function addTag($data): bool
{
    try {
        // Prepare and execute the SQL query to add a tag
        $query = "INSERT INTO tag (tagName) VALUES (?)";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$data['tagName']]);
        return true;
    } catch (\PDOException $e) {
        // Handle the exception (log, throw, or handle gracefully)
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
            $stmt->execute([$data['tagName'], $tagID]);
            return true;
        } catch (\PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
    public function deleteTag($tagID): bool  // Add this method
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
}