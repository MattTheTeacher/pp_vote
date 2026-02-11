<?php
/**
 * public/index.php – Front Controller
 * Lesson 1: home + about
 * Lesson 2 adds:
 * - proposals list page
 * - proposals create form
 * - proposals store route (POST handling)
 */

$page = $_GET['page'] ?? 'home';

// ---------- POST handling (Lesson 2) ----------
if ($page === 'proposals-store') {
    // Minimal back-end handling for Lesson 2
    // (Real validation + FormHelper comes later)
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';

    require_once __DIR__ . '/../app/Views/proposals/store_result.php';
    exit;
}

// ---------- GET routing ----------
switch ($page) {
    case 'about':
        require_once __DIR__ . '/../app/Views/about.php';
        break;

    case 'proposals':
        require_once __DIR__ . '/../app/Views/proposals/index.php';
        break;

    case 'proposals-create':
        require_once __DIR__ . '/../app/Views/proposals/create.php';
        break;

    case 'home':
    default:
        require_once __DIR__ . '/../app/Views/home.php';
        break;
}
