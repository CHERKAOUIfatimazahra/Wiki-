<?php

namespace App\Models;
use PDO;
    
    class Category
    {
        private $db;
    
        private int $categoryID;
        private string $categoryName;
    
        public function __construct()
        {
            $this->db = Database::getInstance()->getConnection();
        }
    
        public function getCategoryID(): int
        {
            return $this->categoryID;
        }
    
        public function setCategoryID(int $categoryID)
        {
            $this->categoryID = $categoryID;
        }
    
        public function getCategoryName(): string
        {
            return $this->categoryName;
        }
    
        public function setCategoryName(string $categoryName)
        {
            $this->categoryName = $categoryName;
        }
    
        public function addCategory($data): bool
        {
            try {
                $query = "INSERT INTO category (categoryName) VALUES (?)";
                $stmt = $this->db->prepare($query);
                $stmt->execute([$data['name']]);
                return true;
            } catch (\PDOException $e) {
                die("Error: " . $e->getMessage());
            }
        }
    
        public function showCategory($categoryID): array
        {
            try {
                $query = "SELECT * FROM category WHERE categoryID = ?";
                $stmt = $this->db->prepare($query);
                $stmt->execute([$categoryID]);
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (\PDOException $e) {
                die("Error: " . $e->getMessage());
            }
        }
    
        public function showAllCategory(): array
        {
            try {
                $query = "SELECT * FROM category";
                $stmt = $this->db->query($query);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (\PDOException $e) {
                die("Error: " . $e->getMessage());
            }
        }
    
        public function editCategory($categoryID, $data): bool
        {
            try {
                $query = "UPDATE category SET categoryName = ? WHERE categoryID = ?";
                $stmt = $this->db->prepare($query);
                $stmt->execute([$data['name'], $categoryID]);
                return true;
            } catch (\PDOException $e) {
                die("Error: " . $e->getMessage());
            }
        }
    
        public function deleteCategory($categoryID): bool
        {
            try {
                $query = "DELETE FROM category WHERE categoryID = ?";
                $stmt = $this->db->prepare($query);
                $stmt->execute([$categoryID]);
                return true;
            } catch (\PDOException $e) {
                die("Error: " . $e->getMessage());
            }
        }
    }