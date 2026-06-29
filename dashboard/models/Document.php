<?php

class Document {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        $stmt = $this->db->query("
            SELECT d.*, c.name as category_name
            FROM documents d
            LEFT JOIN categories c ON d.category_id = c.id
            ORDER BY d.updated_at DESC
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM documents WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getCategories() {
        $stmt = $this->db->query("SELECT * FROM categories ORDER BY name ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getStats() {
        $stats = [
            'total' => $this->db->query("SELECT COUNT(*) FROM documents")->fetchColumn(),
            'active' => $this->db->query("SELECT COUNT(*) FROM documents WHERE status = 'Действующий'")->fetchColumn(),
            'archive' => $this->db->query("SELECT COUNT(*) FROM documents WHERE status = 'Архив'")->fetchColumn(),
        ];
        return $stats;
    }
}
