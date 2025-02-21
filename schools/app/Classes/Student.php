<?php

// CREATE TABLE student_schools (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     school_id INT UNSIGNED NOT NULL,
//     name VARCHAR(255) NOT NULL,
//     seating_number VARCHAR(50) NOT NULL,
//     national_number VARCHAR(50) NOT NULL,
//     graid VARCHAR(50) NOT NULL,
//     specialization VARCHAR(100) NOT NULL,
//     term VARCHAR(50) NOT NULL,
//     result VARCHAR(20) NOT NULL,
//     total_score INT NOT NULL,
//     total_total INT NOT NULL,
//     percentage DECIMAL(5,2) NOT NULL,
//     CONSTRAINT fk_school FOREIGN KEY (school_id) 
//         REFERENCES schools(id) 
//         ON DELETE CASCADE 
//         ON UPDATE CASCADE
// ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

// ALTER TABLE student_schools 
// ADD CONSTRAINT unique_seating_national UNIQUE (seating_number, national_number);




namespace App\Classes; // Correct namespace

class Student {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Retrieve all students along with their school names
    public function getAll($schoolId) {
        $stmt = $this->pdo->prepare("SELECT s.*, sc.name as school_name 
                                     FROM student_schools s 
                                     JOIN schools sc ON s.school_id = sc.id 
                                     WHERE sc.id = ?");
        $stmt->execute([$schoolId]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    

    // Create a new student record
    public function create($school_id, $name, $seating_number, $national_number, $graid, $specialization, $term, $result, $total_score, $total_total) {
        $percentage = ($total_score / $total_total) * 100;
        $stmt = $this->pdo->prepare("INSERT INTO student_schools 
            (school_id, name, seating_number, national_number, graid, specialization, term, result, total_score, total_total, percentage) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$school_id, $name, $seating_number, $national_number, $graid, $specialization, $term, $result, $total_score, $total_total, $percentage]);
    }

    // In classes/Student.php (add these methods if they don't exist)

public function get($id) {
    $stmt = $this->pdo->prepare("SELECT * FROM student_schools WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(\PDO::FETCH_ASSOC);
}

public function update($id, $school_id, $name, $seating_number, $national_number, $graid, $specialization, $term, $result, $total_score, $total_total, $percentage) {
    $stmt = $this->pdo->prepare("UPDATE student_schools 
        SET school_id = ?, name = ?, seating_number = ?, national_number = ?, graid = ?, specialization = ?, term = ?, result = ?, total_score = ?, total_total = ?, percentage = ? 
        WHERE id = ?");
    return $stmt->execute([
        $school_id, $name, $seating_number, $national_number, $graid,
        $specialization, $term, $result, $total_score, $total_total, $percentage, $id
    ]);
}



public function delete($id) {
    $stmt = $this->pdo->prepare("DELETE FROM student_schools WHERE id=?");
    return $stmt->execute([$id]);
}



public function filter($filterType, $filterValue, $schoolName) {
    // Allow only safe columns
    $allowed = ['national_number', 'seating_number'];
    if (!in_array($filterType, $allowed)) {
         return "invalid type";
    }
    
    // Build the query using an equality operator with parameterized school ID
    $sql = "SELECT s.*, sc.name as school_name 
            FROM student_schools s 
            JOIN schools sc ON s.school_id = sc.id 
            WHERE s." . $filterType . " = ? AND sc.name = ?";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([$filterValue, $schoolName]);
    
    // Since each student is unique by national_number or seating_number,
    // fetch a single record.
    $result = $stmt->fetch(\PDO::FETCH_ASSOC);
    
    // Return the result as a one-element array if found, otherwise an empty array.
    return $result ? [$result] : [];
}



    // (You can add methods to get, update, or delete students similarly)

}
