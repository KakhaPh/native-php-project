<?php

require_once __DIR__ . '../../includes/functions.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['action'])) {
        $action = $_POST['action'];

        if($action === 'create') {
            addItem($pdo, $_POST['name'], $_POST['description']);
        }elseif($action === 'update') {
            updateItem($pdo, $_POST['id'], $_POST['name'], $_POST['description']);
        }elseif($action === 'delete') {
            deleteItem($pdo, $_POST['id']);
        }

        header('Location: /');
        exit;
    }
}

$items = fetchItems($pdo);

require __DIR__ . '../..//views/index.php';