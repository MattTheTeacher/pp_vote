<?php
require_once __DIR__ . '/../app/Controllers/ProposalController.php';

$page = $_GET['page'] ?? 'home';
$proposalController = new ProposalController();

switch ($page) {
    case 'home':
        require_once __DIR__ . '/../app/Views/home.php';
        break;

    case 'about':
        require_once __DIR__ . '/../app/Views/about.php';
        break;

    case 'proposals':
        $proposalController->index();
        break;
    case 'proposal':
        $proposalController->show();
        break;
    case 'proposals-create':
        $proposalController->create();
        break;
    case 'proposals-store':
        $proposalController->store();
        break;
    case 'proposals-edit':
        $proposalController->edit();
        break;
    case 'proposals-update':
        $proposalController->update();
        break;
    default:
        require_once __DIR__ . '/../app/Views/home.php';
}
