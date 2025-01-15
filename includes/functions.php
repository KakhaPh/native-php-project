<?php

require_once __DIR__ . '/db.php';

// Fetch all items

function fetchItems($pdo) {
    $stmt = $pdo->query("SELECT * FROM items ORDER BY created_at DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}