<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/controllers/DashboardController.php';

// Database connection
$dbPath = __DIR__ . '/data/kb.sqlite';
try {
    $db = new PDO('sqlite:' . $dbPath);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Simple routing
$action = $_GET['action'] ?? 'index';

$controller = new DashboardController($db);

switch ($action) {
    case 'index':
    default:
        $controller->index();
        break;
}
