<?php
class Proposal {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=pp_vote', 'root', '');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getAll() {
        return $this->db->query("SELECT * FROM proposals")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM proposals WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($title, $description) {
        $stmt = $this->db->prepare(
            "INSERT INTO proposals (title, description) VALUES (:t, :d)"
        );
        $stmt->execute([':t' => $title, ':d' => $description]);
    }

    public function update($id, $title, $description) {
        $stmt = $this->db->prepare(
            "UPDATE proposals SET title = :t, description = :d WHERE id = :id"
        );
        $stmt->execute([':id' => $id, ':t' => $title, ':d' => $description]);
    }
}
