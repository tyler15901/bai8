<?php
include_once "models/Movie.php";
class MovieQuery {
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    public function all() {
        $stmt = $this->pdo->query("SELECT * FROM movie");
        $result = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = new Movie($row['id'], $row['name']);
        }
        return $result;
    }
    public function find($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM movie WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new Movie($row['id'], $row['name']);
        }
        return null;
    }
}
