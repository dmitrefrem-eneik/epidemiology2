<?php

$dbPath = __DIR__ . '/kb.sqlite';

try {
    $db = new PDO('sqlite:' . $dbPath);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create categories table
    $db->exec("CREATE TABLE IF NOT EXISTS categories (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        parent_id INTEGER DEFAULT NULL
    )");

    // Create documents table
    $db->exec("CREATE TABLE IF NOT EXISTS documents (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        title TEXT NOT NULL,
        type TEXT NOT NULL,
        category_id INTEGER,
        version TEXT DEFAULT '1.0',
        status TEXT DEFAULT 'Действующий',
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        responsible TEXT,
        tags TEXT,
        FOREIGN KEY (category_id) REFERENCES categories(id)
    )");

    // Seed initial categories
    $categories = [
        'Нормативная база',
        'Учебно-методические материалы',
        'Аттестации и экзамены',
        'Практика и отчётность',
        'Шаблоны документов'
    ];

    $stmt = $db->prepare("INSERT OR IGNORE INTO categories (name) VALUES (?)");
    foreach ($categories as $cat) {
        $stmt->execute([$cat]);
    }

    // Seed initial documents (examples from TS)
    $docs = [
        ['Порядок приема на обучение по программам ординатуры на 2026-2027 год', 'Порядок', 1, '1.0', 'Действующий', 'Отдел ординатуры', 'прием-2026, ординатура'],
        ['Положение о стипендиальном обеспечении (2024)', 'Положение', 5, '2.1', 'Действующий', 'Бухгалтерия', 'стипендии, 2024'],
        ['ФГОС: Эпидемиология', 'Нормативный акт', 1, '1.0', 'Действующий', 'Рособрнадзор', 'ФГОС, Эпидемиология']
    ];

    $stmt = $db->prepare("INSERT INTO documents (title, type, category_id, version, status, responsible, tags) VALUES (?, ?, ?, ?, ?, ?, ?)");
    foreach ($docs as $doc) {
        $stmt->execute($doc);
    }

    echo "Database initialized and seeded successfully.\n";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
