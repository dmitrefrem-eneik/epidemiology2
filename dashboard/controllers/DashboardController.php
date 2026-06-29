<?php

require_once __DIR__ . '/../models/Document.php';

class DashboardController {
    private $documentModel;

    public function __construct($db) {
        $this->documentModel = new Document($db);
    }

    public function index() {
        $documents = $this->documentModel->getAll();
        $stats = $this->documentModel->getStats();

        $title = "Панель управления - База знаний";

        // Start output buffering to capture the view
        ob_start();
        include __DIR__ . '/../views/dashboard.php';
        $content = ob_get_clean();

        // Include the layout and pass the content
        include __DIR__ . '/../views/layout.php';
    }
}
