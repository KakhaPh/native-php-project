<?php include_once 'header.php'; ?>
<h1>Item List</h1>

<!-- Add Item Form -->
<form method="POST">
    <input type="hidden" name="action" value="create">
    <input type="text" name="name" placeholder="Name" required>
    <textarea name="description" placeholder="Description" required></textarea>
    <button type="submit">Add Item</button>
</form>

<hr>

<!-- Items List -->
<ul>
    <?php foreach ($items as $item): ?>
        <li>
            <strong><?php echo htmlspecialchars($item['name']); ?></strong>: 
            <?php echo htmlspecialchars($item['description']); ?>
            <form method="POST" style="display:inline;">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                <input type="text" name="name" value="<?php echo htmlspecialchars($item['name']); ?>" required>
                <textarea name="description" required><?php echo htmlspecialchars($item['description']); ?></textarea>
                <button type="submit">Update</button>
            </form>
            <form method="POST" style="display:inline;">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                <button type="submit">Delete</button>
            </form>
        </li>
    <?php endforeach; ?>
</ul>

<?php include_once 'footer.php'; ?>