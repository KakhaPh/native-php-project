<?php

require_once __DIR__ . '/db.php';

// Fetch all items
function fetchItems($pdo) {
    $stmt = $pdo->query("SELECT * FROM items ORDER BY created_at DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fetch a single item by ID 
function fetchItemById($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM items WHERE id = :id");
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Add a new item
function addItem($pdo, $name, $description) {
    $stmt = $pdo->prepare("INSERT INTO items (name, description) VALUES (:name, :description)");
    $stmt->execute(['name' => $name, 'description' => $description]);
}

// Update an item 
function updateItem($pdo, $id, $name, $description) {
    $stmt = $pdo->prepare("UPDATE items SET name = :name, description = :description WHERE id = :id");
    $stmt->execute(['id' => $id, 'name' => $name, 'description' => $description]);
}

// Delete an item
function deleteItem($pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM items WHERE id = :id");
    $stmt->execute(['id' => $id]);
}