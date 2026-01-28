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
        // Lesson 3: still no server-side validation or database storage
        $title = $_POST['title'] ?? '';
        $description = $_POST['description'] ?? '';

        require_once __DIR__ . '/../Views/proposals/store_result.php';
    }
}
