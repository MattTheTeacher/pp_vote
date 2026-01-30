<?php

class ProposalController
{
    public function index()
    {
        require_once __DIR__ . '/../Core/Database.php';

        $db = Database::connect();
        $stmt = $db->query("SELECT * FROM proposals ORDER BY created_at DESC");
        $proposals = $stmt->fetchAll();

        require_once __DIR__ . '/../Views/proposals/index.php';
    }
    public function show()
    {
        require_once __DIR__ . '/../Core/Database.php';

        $id = $_GET['id'] ?? null;

        if (!$id || !is_numeric($id)) {
            $error = "Invalid proposal ID.";
            require_once __DIR__ . '/../Views/proposals/show.php';
            return;
        }

        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM proposals WHERE id = :id LIMIT 1");
        $stmt->execute([':id' => (int)$id]);
        $proposal = $stmt->fetch();

        if (!$proposal) {
            $error = "Proposal not found.";
            require_once __DIR__ . '/../Views/proposals/show.php';
            return;
        }

        require_once __DIR__ . '/../Views/proposals/show.php';
    }

    public function create()
    {
        require_once __DIR__ . '/../Views/proposals/create.php';
    }

    public function store()
    {
        require_once __DIR__ . '/../Core/FormHelper.php';
        require_once __DIR__ . '/../Core/Database.php';

        $form = new FormHelper();

        $title = $form->text($_POST['title'] ?? '', 'title', 5, 60);
        $description = $form->text($_POST['description'] ?? '', 'description', 20, 500);

        if ($form->hasErrors()) {
            $errors = $form->errors();
            $old = [
                'title' => $title,
                'description' => $description,
            ];
            require_once __DIR__ . '/../Views/proposals/create.php';
            return;
        }

        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO proposals (title, description) VALUES (:title, :description)");
        $stmt->execute([
            ':title' => $title,
            ':description' => $description,
        ]);

        require_once __DIR__ . '/../Views/proposals/store_result.php';
    }
}
