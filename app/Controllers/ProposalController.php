<?php

class ProposalController
{
    public function index()
    {
        require_once __DIR__ . '/../Views/proposals/index.php';
    }

    public function create()
    {
        require_once __DIR__ . '/../Views/proposals/create.php';
    }

    public function store()
    {
        require_once __DIR__ . '/../Core/FormHelper.php';

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

        require_once __DIR__ . '/../Views/proposals/store_result.php';
    }
}
