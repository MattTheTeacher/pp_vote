<?php
require_once __DIR__ . '/../Models/Proposal.php';
require_once __DIR__ . '/../Core/FormHelper.php';

class ProposalController
{
    public function index(): void
    {
        $model = new Proposal();
        $proposals = $model->getAll();
        $created = !empty($_GET['created']);
        $deleted = !empty($_GET['deleted']);
        require __DIR__ . '/../Views/proposals/index.php';
    }

    public function show(): void
    {
        $id = $_GET['id'] ?? null;

        if (!$id || !is_numeric($id)) {
            $error = "Invalid proposal ID.";
            require __DIR__ . '/../Views/proposals/show.php';
            return;
        }

        $model = new Proposal();
        $proposal = $model->getById((int)$id);

        if (!$proposal) {
            $error = "Proposal not found.";
            require __DIR__ . '/../Views/proposals/show.php';
            return;
        }

        $updated = !empty($_GET['updated']);
        require __DIR__ . '/../Views/proposals/show.php';
    }

    public function create(): void
    {
        $errors = $errors ?? [];
        $old = $old ?? ['title' => '', 'description' => ''];
        require __DIR__ . '/../Views/proposals/create.php';
    }

    public function store(): void
    {
        $form = new FormHelper();

        $title = $form->text($_POST['title'] ?? '', 'title', 5, 100);
        $description = $form->text($_POST['description'] ?? '', 'description', 20, 500);

        $errors = $form->errors();
        $old = [
            'title' => $_POST['title'] ?? '',
            'description' => $_POST['description'] ?? '',
        ];

        if ($form->hasErrors()) {
            require __DIR__ . '/../Views/proposals/create.php';
            return;
        }

        $model = new Proposal();
        $model->create($title, $description);

        header('Location: ?page=proposals&created=1');
        exit;
    }

    public function edit(): void
    {
        $id = $_GET['id'] ?? null;

        if (!$id || !is_numeric($id)) {
            $error = "Invalid proposal ID.";
            require __DIR__ . '/../Views/proposals/edit.php';
            return;
        }

        $model = new Proposal();
        $proposal = $model->getById((int)$id);

        if (!$proposal) {
            $error = "Proposal not found.";
            require __DIR__ . '/../Views/proposals/edit.php';
            return;
        }

        // Prefill from DB
        $old = [
            'title' => $proposal['title'] ?? '',
            'description' => $proposal['description'] ?? '',
        ];
        $errors = [];

        require __DIR__ . '/../Views/proposals/edit.php';
    }

    public function update(): void
    {
        $id = $_POST['id'] ?? null;

        if (!$id || !is_numeric($id)) {
            $error = "Invalid proposal ID.";
            $proposal = ['id' => 0];
            $old = [
                'title' => $_POST['title'] ?? '',
                'description' => $_POST['description'] ?? '',
            ];
            $errors = ['id' => 'Invalid proposal ID.'];
            require __DIR__ . '/../Views/proposals/edit.php';
            return;
        }

        $model = new Proposal();
        $proposal = $model->getById((int)$id);

        if (!$proposal) {
            $error = "Proposal not found.";
            require __DIR__ . '/../Views/proposals/edit.php';
            return;
        }

        $form = new FormHelper();

        $title = $form->text($_POST['title'] ?? '', 'title', 5, 100);
        $description = $form->text($_POST['description'] ?? '', 'description', 20, 500);

        $errors = $form->errors();
        $old = [
            'title' => $_POST['title'] ?? '',
            'description' => $_POST['description'] ?? '',
        ];

        if ($form->hasErrors()) {
            require __DIR__ . '/../Views/proposals/edit.php';
            return;
        }

        $model->update((int)$id, $title, $description);

        header('Location: ?page=proposal&id=' . (int)$id . '&updated=1');
        exit;
    }
    public function deleteConfirm(): void
    {
        $id = $_GET['id'] ?? null;

        if (!$id || !is_numeric($id)) {
            $error = "Invalid proposal ID.";
            require __DIR__ . '/../Views/proposals/delete_confirm.php';
            return;
        }

        $model = new Proposal();
        $proposal = $model->getById((int)$id);

        if (!$proposal) {
            $error = "Proposal not found.";
            require __DIR__ . '/../Views/proposals/delete_confirm.php';
            return;
        }

        require __DIR__ . '/../Views/proposals/delete_confirm.php';
    }

    public function destroy(): void
    {
        $id = $_POST['id'] ?? null;

        if (!$id || !is_numeric($id)) {
            header('Location: ?page=proposals');
            exit;
        }

        $model = new Proposal();
        $model->delete((int)$id);

        // PRG redirect back to list
        header('Location: ?page=proposals&deleted=1');
        exit;
    }

}
