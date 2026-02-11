<?php

class ProposalController
{
    public function index()
    {
        require_once __DIR__ . '/../Models/Proposal.php';

        $proposalModel = new Proposal();
        $proposals = $proposalModel->getAll();

        require_once __DIR__ . '/../Views/proposals/index.php';
    }

    public function show()
    {
        $id = $_GET['id'] ?? null;

        if (!$id || !is_numeric($id)) {
            $error = "Invalid proposal ID.";
            require_once __DIR__ . '/../Views/proposals/show.php';
            return;
        }

        require_once __DIR__ . '/../Models/Proposal.php';

        $proposalModel = new Proposal();
        $proposal = $proposalModel->getById((int)$id);

        if (!$proposal) {
            $error = "Proposal not found.";
            require_once __DIR__ . '/../Views/proposals/show.php';
            return;
        }

        require_once __DIR__ . '/../Views/proposals/show.php';
    }

    public function create()
    {
        // $errors and $old may be set by store() when validation fails
        require_once __DIR__ . '/../Views/proposals/create.php';
    }

    public function store()
    {
        require_once __DIR__ . '/../Core/FormHelper.php';

        $form = new FormHelper();

        $title = $form->text($_POST['title'] ?? '', 'title', 5, 100);
        $description = $form->text($_POST['description'] ?? '', 'description', 20, 500);

        $errors = $form->errors();
        $old = [
            'title' => $_POST['title'] ?? '',
            'description' => $_POST['description'] ?? '',
        ];

        if ($form->hasErrors()) {
            require_once __DIR__ . '/../Views/proposals/create.php';
            return;
        }

        require_once __DIR__ . '/../Models/Proposal.php';

        $proposalModel = new Proposal();
        $proposalModel->create($title, $description);

        // keep existing flow used in earlier lessons (shows submitted data)
        require_once __DIR__ . '/../Views/proposals/store_result.php';
    }
}
