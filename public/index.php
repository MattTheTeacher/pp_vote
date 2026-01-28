<?php
/**
 * public/index.php – Front Controller (Router)
 * Lesson 3: route requests to Controller classes (OOP)
 */

require_once __DIR__ . '/../app/Controllers/ProposalController.php';

$page = $_GET['page'] ?? 'home';

$proposalController = new ProposalController();

switch ($page) {
    case 'proposals':
        $proposalController->index();
        break;

    case 'proposals-create':
        $proposalController->create();
        break;

    case 'proposals-store':
        $proposalController->store();
        break;

    case 'about':
        require_once __DIR__ . '/../app/Views/about.php';
        break;

    case 'home':
    default:
        require_once __DIR__ . '/../app/Views/home.php';
        break;
}
