<?php

// CREATE TABLE `schools` (
//     `id` INT AUTO_INCREMENT PRIMARY KEY,
//     `name` VARCHAR(255) NOT NULL,
//     `address` TEXT NOT NULL,
//     `phone` VARCHAR(20) NOT NULL
// ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

// ALTER TABLE schools MODIFY id INT UNSIGNED AUTO_INCREMENT;

namespace App\Classes; // Correct namespace

use PDOException;


class School {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Retrieve all schools
    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM schools");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC); // Returns an array of schools or an empty array if no records
    }
    

    // Create a new school
    public function create($name, $address, $phone) {
        $stmt = $this->pdo->prepare("INSERT INTO schools (name, address, phone) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $address, $phone]);
    }

    // Get a single school by ID
    public function get($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM schools WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    // Update school details
    public function update($id, $name, $address, $phone) {
        try {
            $stmt = $this->pdo->prepare("UPDATE schools SET name = ?, address = ?, phone = ? WHERE id = ?");
            if ($stmt->execute([$name, $address, $phone, $id])) {
                return true;
            } else {
                error_log("Update failed: " . implode(", ", $stmt->errorInfo())); // Logs error to Apache or PHP logs
                return false;
            }
        } catch (PDOException $e) {
            error_log("Database Error: " . $e->getMessage());
            return false;
        }
    }
    

    // Delete a school
    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM schools WHERE id=?");
        return $stmt->execute([$id]);
    }
}
