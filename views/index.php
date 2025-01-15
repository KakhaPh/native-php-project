<?php include_once 'header.php'; ?>

<div class="container my-5">
        <h1 class="text-center mb-4">CRUD Application</h1>

        <!-- Add Item Form -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h4>Add New Item</h4>
            </div>
            <div class="card-body">
                <form method="POST">
                    <input type="hidden" name="action" value="create">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter item name" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea id="description" name="description" class="form-control" placeholder="Enter item description" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Add Item</button>
                </form>
            </div>
        </div>

        <!-- Items List -->
        <div class="card">
            <div class="card-header bg-secondary text-white">
                <h4>Items List</h4>
            </div>
            <div class="card-body">
                <?php if (!empty($items)): ?>
                    <ul class="list-group">
                        <?php foreach ($items as $item): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong><?php echo htmlspecialchars($item['name']); ?></strong>: 
                                    <?php echo htmlspecialchars($item['description']); ?>
                                </div>
                                <div>
                                    <!-- Update Form (Inline) -->
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="collapse" data-bs-target="#update-<?php echo $item['id']; ?>" aria-expanded="false">Edit</button>
                                    <form method="POST" class="d-inline-block">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </li>
                            <!-- Update Form (Collapsible) -->
                            <div class="collapse mt-2" id="update-<?php echo $item['id']; ?>">
                                <div class="card card-body">
                                    <form method="POST">
                                        <input type="hidden" name="action" value="update">
                                        <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                                        <div class="mb-3">
                                            <label for="name-<?php echo $item['id']; ?>" class="form-label">Name</label>
                                            <input type="text" id="name-<?php echo $item['id']; ?>" name="name" class="form-control" value="<?php echo htmlspecialchars($item['name']); ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="description-<?php echo $item['id']; ?>" class="form-label">Description</label>
                                            <textarea id="description-<?php echo $item['id']; ?>" name="description" class="form-control" rows="2" required><?php echo htmlspecialchars($item['description']); ?></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success">Save Changes</button>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p class="text-muted">No items found. Add your first item above.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

<?php include_once 'footer.php'; ?>