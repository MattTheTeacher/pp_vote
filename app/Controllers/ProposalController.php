<?php

class ProposalController
{
    public function index()
    {
        require_once __DIR__ . '/../Models/Proposal.php';

        $proposalModel = new Proposal();
        $proposals = $proposalModel->getAll();

        // PRG success flag (shown after successful CREATE)
        $created = !empty($_GET['created']);

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
        require_once __DIR__ . '/../Views/proposals/create.php';
    }

    public function store()
    {
        require_once __DIR__ . '/../Core/FormHelper.php';
        require_once __DIR__ . '/../Models/Proposal.php';

        $form = new FormHelper();

        // Validate inputs
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

        // TRUE MVC: INSERT happens in the model
        $proposalModel = new Proposal();
        $proposalModel->create($title, $description);

        // PRG: Redirect to prevent duplicate submissions on refresh
        header('Location: ?page=proposals&created=1');
        exit;
    }
}
