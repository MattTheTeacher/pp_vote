<?php
/**
 * Lesson 1: Front Controller (single entry point)
 * URL examples:
 *   http://localhost/pp_vote/public/
 *   http://localhost/pp_vote/public/?page=about
 */

$page = $_GET['page'] ?? 'home';

if ($page === 'about') {
    require_once __DIR__ . '/../app/Views/about.php';
} else {
    require_once __DIR__ . '/../app/Views/home.php';
}
