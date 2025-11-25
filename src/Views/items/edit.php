<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Item</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/erp-demo/index.php">ERP System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navMenu" aria-controls="navMenu" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="/erp-demo/index.php?controller=customers&action=index">Customers</a></li>
                <li class="nav-item"><a class="nav-link active" href="/erp-demo/index.php?controller=items&action=index">Items</a></li>
                <li class="nav-item"><a class="nav-link" href="/erp-demo/index.php?controller=reports&action=index">Reports</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- MAIN CONTENT -->
<div class="container py-5">

    <div class="mb-4">
        <h2 class="fw-semibold">Edit Item</h2>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form method="POST" action="/erp-demo/index.php?controller=items&action=update&id=<?= $item['id'] ?>">

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="item_code" class="form-label">Item Code</label>
                                <input type="text" class="form-control" id="item_code" name="item_code" 
                                       value="<?= htmlspecialchars($item['item_code']) ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="item_name" class="form-label">Item Name</label>
                                <input type="text" class="form-control" id="item_name" name="item_name" 
                                       value="<?= htmlspecialchars($item['item_name']) ?>" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="category_id" class="form-label">Category</label>
                                <select class="form-select" id="category_id" name="item_category_id" required>
                                    <?php foreach ($categories as $c): ?>
                                        <option value="<?= $c['id'] ?>" 
                                            <?= $item['item_category_id'] == $c['id'] ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($c['name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="subcategory_id" class="form-label">Sub Category</label>
                                <select class="form-select" id="subcategory_id" name="item_subcategory_id" required>
                                    <?php foreach ($subcategories as $sc): ?>
                                        <option value="<?= $sc['id'] ?>" 
                                            <?= $item['item_subcategory_id'] == $sc['id'] ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($sc['name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" min="0" class="form-control" id="quantity" name="quantity" 
                                       value="<?= $item['quantity'] ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="unit_price" class="form-label">Unit Price</label>
                                <input type="number" step="0.01" min="0" class="form-control" id="unit_price" name="unit_price" 
                                       value="<?= $item['unit_price'] ?>" required>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="/erp-demo/index.php?controller=items&action=index" class="btn btn-secondary me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update Item</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

