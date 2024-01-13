<?php

namespace App\Models;

use PDO;

class User
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function showAll()
    {
        try {
            // Prepare and execute the SQL query to select all users
            $query = "SELECT * FROM users";
            $statement = $this->db->query($query);

            // Fetch all users as an associative array
            $users = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $users;
        } catch (\PDOException $e) {
            // Handle the exception
            die("Error: " . $e->getMessage());
        }
    }

    public function create($data)
    {
        $stmt = $this->db->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->execute($data);
        return $stmt;
    }

    public function find($id)
    {
        try {
            // Prepare and execute the SQL query to select a user by ID
            $query = "SELECT * FROM users WHERE id = ?";
            $statement = $this->db->prepare($query);
            $statement->execute([$id]);

            // Fetch the user as an associative array
            $user = $statement->fetch(PDO::FETCH_ASSOC);

            return $user;
        } catch (\PDOException $e) {
            // Handle the exception
            die("Error: " . $e->getMessage());
        }
    }

    public function update($id, $data)
    {
        try {
            // Prepare and execute the SQL query to update a user by ID
            $query = "UPDATE users SET name = ?, email = ?, password = ?, role = ? WHERE id = ?";
            $statement = $this->db->prepare($query);
            $data[] = $id;
            $statement->execute($data);

            return $statement;
        } catch (\PDOException $e) {
            // Handle the exception
            die("Error: " . $e->getMessage());
        }
    }

    public function delete($id)
    {


        // dump($id['id']);die();
        try {
            $step = $this->db->prepare("DELETE FROM users WHERE id=:id");
            $step->bindParam(":id", $id['id'], PDO::PARAM_INT);
            $step->execute();

            if ($step->execute()) {
                return $step;
                // echo $step->rowCount() . ' row(s) was deleted successfully.';
            }

        } catch (\PDOException $e) {
            // Handle the exception
            die("Error: " . $e->getMessage());
        }
        // connect to the database and select the publisher

        // $user_id = $id ;

        // $sql = 'DELETE FROM users WHERE id = :id';


        // $statement = $this->db->prepare($sql);
        // $statement->bindParam(':id', $user_id, PDO::PARAM_INT);

        // if ($statement->execute()) {
        //     echo $statement->rowCount() . ' row(s) was deleted successfully.';
        // }
    }

    // login , register and logout
    public function login($email, $password)
    {

        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");

        $stmt->bindValue(1, $email);

        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;

    }
    public function register($name, $email, $password, $role)
    {
        $passhash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");

        $stmt->bindValue(1, $name);
        $stmt->bindValue(2, $email);
        $stmt->bindValue(3, $passhash);
        $stmt->bindValue(4, $role);


        $result = $stmt->execute();

        if ($result) {
            return true;
        }

        return false;
    }
    public function getCount(){
        return $this->selectRecords('COUNT(*) as COUNT',' role = "author" ');
    }
}