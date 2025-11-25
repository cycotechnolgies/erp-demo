<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Item Report</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
                <li class="nav-item"><a class="nav-link" href="/erp-demo/index.php?controller=items&action=index">Items</a></li>
                <li class="nav-item"><a class="nav-link active" href="/erp-demo/index.php?controller=reports&action=index">Reports</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container py-5">
    <div class="mb-4">
        <h2 class="fw-semibold">Item Report</h2>
    </div>

    <div class="card shadow-sm">
        <div class="card-body table-responsive">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead class="table-primary">
                    <tr>
                        <th>Item Name</th>
                        <th>Category</th>
                        <th>Subcategory</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($items)): ?>
                        <tr><td colspan="4" class="text-center">No records found</td></tr>
                    <?php else: ?>
                        <?php foreach ($items as $it): ?>
                            <tr>
                                <td><?= htmlspecialchars($it['item_name']) ?></td>
                                <td><?= htmlspecialchars($it['item_category']) ?></td>
                                <td><?= htmlspecialchars($it['item_subcategory']) ?></td>
                                <td><?= $it['quantity'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
