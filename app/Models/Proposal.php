<?php
require_once __DIR__ . '/../Core/Database.php';

class Proposal
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::pdo();
    }

    public function getAll(): array
    {
        $stmt = $this->db->query(
            "SELECT id, title, description, created_at FROM proposals ORDER BY id DESC"
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById(int $id): ?array
    {
        $stmt = $this->db->prepare(
            "SELECT id, title, description, created_at FROM proposals WHERE id = :id"
        );
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    public function create(string $title, string $description): void
    {
        $stmt = $this->db->prepare(
            "INSERT INTO proposals (title, description) VALUES (:title, :description)"
        );
        $stmt->execute([':title' => $title, ':description' => $description]);
    }

    public function update(int $id, string $title, string $description): int
    {
        $stmt = $this->db->prepare(
            "UPDATE proposals SET title = :title, description = :description WHERE id = :id"
        );
        $stmt->execute([':id' => $id, ':title' => $title, ':description' => $description]);
        return $stmt->rowCount();
    }
    public function delete(int $id): int
    {
        $stmt = $this->db->prepare(
            "DELETE FROM proposals WHERE id = :id"
        );
        $stmt->execute([':id' => $id]);
        return $stmt->rowCount();
    }
}
