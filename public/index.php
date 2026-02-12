<?php
require_once __DIR__ . '/../app/Controllers/ProposalController.php';

$page = $_GET['page'] ?? 'home';
$controller = new ProposalController();

switch ($page) {
    case 'home':
        require __DIR__ . '/../app/Views/home.php';
        break;

    case 'about':
        require __DIR__ . '/../app/Views/about.php';
        break;

    case 'proposals':
        $controller->index();
        break;

    case 'proposal':
        $controller->show();
        break;

    case 'proposals-create':
        $controller->create();
        break;

    case 'proposals-store':
        $controller->store();
        break;

    case 'proposals-edit':
        $controller->edit();
        break;

    case 'proposals-update':
        $controller->update();
        break;

    case 'proposals-delete':
        $controller->deleteConfirm();
        break;

    case 'proposals-destroy':
        $controller->destroy();
        break;

    default:
        require __DIR__ . '/../app/Views/home.php';
        break;
}
