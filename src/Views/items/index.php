<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Items</title>
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
                <li class="nav-item">
                    <a class="nav-link" href="/erp-demo/index.php?controller=customers&action=index">Customers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/erp-demo/index.php?controller=items&action=index">Items</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/erp-demo/index.php?controller=invoices&action=index">Invoices</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/erp-demo/index.php?controller=reports&action=index">Reports</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- MAIN CONTENT -->
<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-semibold mb-0">Item List</h2>

        <a href="/erp-demo/index.php?controller=items&action=create" class="btn btn-primary">
           + Add Item
        </a>
    </div>

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-striped table-hover align-middle mb-0">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Item Code</th>
                    <th>Item Name</th>
                    <th>Category</th>
                    <th>Sub Category</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th class="text-center" style="width:150px;">Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($items as $i): ?>
                    <tr>
                        <td><?= $i['id'] ?></td>
                        <td><?= htmlspecialchars($i['item_code']) ?></td>
                        <td><?= htmlspecialchars($i['item_name']) ?></td>
                        <td><?= htmlspecialchars($i['category_name']) ?></td>
                        <td><?= htmlspecialchars($i['subcategory_name']) ?></td>
                        <td><?= $i['quantity'] ?></td>
                        <td><?= number_format($i['unit_price'],2) ?></td>
                        <td class="text-center">
                            <a href="/erp-demo/index.php?controller=items&action=edit&id=<?= $i['id'] ?>" 
                               class="btn btn-sm btn-warning me-1">Edit</a>
                            <a onclick="return confirm('Delete this item?')"
                               href="/erp-demo/index.php?controller=items&action=delete&id=<?= $i['id'] ?>" 
                               class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>

</div>

<script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
</script>

</body>
</html>
