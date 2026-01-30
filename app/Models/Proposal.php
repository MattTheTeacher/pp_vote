<?php

/**
 * Proposal Model
 * Handles all database queries for proposals (READ operations for Lesson 7).
 */
class Proposal
{
    private $db;

    public function __construct()
    {
        require_once __DIR__ . '/../Core/Database.php';
        $this->db = Database::connect();
    }

    /**
     * Get all proposals (newest first).
     */
    public function getAll(): array
    {
        $stmt = $this->db->query("SELECT * FROM proposals ORDER BY created_at DESC");
        return $stmt->fetchAll();
    }

    /**
     * Get a single proposal by ID (or false if not found).
     */
    public function getById(int $id): array|false
    {
        $stmt = $this->db->prepare("SELECT * FROM proposals WHERE id = :id LIMIT 1");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }
}
