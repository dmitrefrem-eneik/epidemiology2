<?php

require_once __DIR__ . '/../models/Document.php';

$dbPath = __DIR__ . '/../data/kb.sqlite';
$db = new PDO('sqlite:' . $dbPath);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$model = new Document($db);

// Test stats
$stats = $model->getStats();
echo "Total documents: " . $stats['total'] . "\n";
assert($stats['total'] >= 3);

// Test list
$documents = $model->getAll();
echo "First document title: " . $documents[0]['title'] . "\n";
assert(!empty($documents[0]['title']));

echo "All database tests passed!\n";
