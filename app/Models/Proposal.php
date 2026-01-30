<?php

/**
 * Proposal Model (TRUE MVC)
 * All database queries for proposals live here.
 */
class Proposal
{
    private $db;

    public function __construct()
    {
        require_once __DIR__ . '/../Core/Database.php';
        $this->db = Database::connect();
    }

    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM proposals ORDER BY created_at DESC");
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM proposals WHERE id = :id LIMIT 1");
        $stmt->execute([':id' => (int)$id]);
        return $stmt->fetch();
    }

    public function create($title, $description)
    {
        $stmt = $this->db->prepare("INSERT INTO proposals (title, description) VALUES (:title, :description)");
        $stmt->execute([
            ':title' => $title,
            ':description' => $description,
        ]);
    }
}
