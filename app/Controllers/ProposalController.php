<?php
class ProposalController {

    public function index() {
        require_once __DIR__ . '/../Models/Proposal.php';
        $model = new Proposal();
        $proposals = $model->getAll();
        $created = !empty($_GET['created']); // if you later use PRG for create
        require_once __DIR__ . '/../Views/proposals/index.php';
    }

    public function show() {
        $id = $_GET['id'] ?? null;

        if (!$id || !is_numeric($id)) {
            $error = "Invalid proposal ID.";
            require_once __DIR__ . '/../Views/proposals/show.php';
            return;
        }

        require_once __DIR__ . '/../Models/Proposal.php';
        $model = new Proposal();
        $proposal = $model->getById((int)$id);

        if (!$proposal) {
            $error = "Proposal not found.";
            require_once __DIR__ . '/../Views/proposals/show.php';
            return;
        }

        $updated = !empty($_GET['updated']);
        require_once __DIR__ . '/../Views/proposals/show.php';
    }

    public function create() {
        // ensure variables exist for the view
        $errors = $errors ?? [];
        $old = $old ?? ['title' => '', 'description' => ''];
        require_once __DIR__ . '/../Views/proposals/create.php';
    }

    public function store() {
        require_once __DIR__ . '/../Models/Proposal.php';
        $model = new Proposal();

        $title = $_POST['title'] ?? '';
        $description = $_POST['description'] ?? '';

        $model->create($title, $description);

        // PRG redirect (keeps behaviour consistent with Lesson 8)
        header('Location: ?page=proposals&created=1');
        exit;
    }

    public function edit() {
        $id = $_GET['id'] ?? null;

        if (!$id || !is_numeric($id)) {
            $error = "Invalid proposal ID.";
            require_once __DIR__ . '/../Views/proposals/edit.php';
            return;
        }

        require_once __DIR__ . '/../Models/Proposal.php';
        $model = new Proposal();
        $proposal = $model->getById((int)$id);

        if (!$proposal) {
            $error = "Proposal not found.";
            require_once __DIR__ . '/../Views/proposals/edit.php';
            return;
        }

        // ✅ Prefill form fields from database record
        $old = [
            'title' => $proposal['title'] ?? '',
            'description' => $proposal['description'] ?? '',
        ];
        $errors = [];

        require_once __DIR__ . '/../Views/proposals/edit.php';
    }

    public function update() {
        require_once __DIR__ . '/../Models/Proposal.php';
        $model = new Proposal();

        $id = $_POST['id'] ?? null;
        if (!$id || !is_numeric($id)) {
            $error = "Invalid proposal ID.";
            $proposal = ['id' => 0];
            $old = [
                'title' => $_POST['title'] ?? '',
                'description' => $_POST['description'] ?? '',
            ];
            $errors = [];
            require_once __DIR__ . '/../Views/proposals/edit.php';
            return;
        }

        $title = $_POST['title'] ?? '';
        $description = $_POST['description'] ?? '';

        $model->update((int)$id, $title, $description);

        header('Location: ?page=proposal&id=' . (int)$id . '&updated=1');
        exit;
    }
}
