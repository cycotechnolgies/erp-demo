<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Report - ERP System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f7f9fb; }
        .table-responsive { margin-top: 20px; }
        .breadcrumb { background: none; padding: 0; margin-bottom: 1.5rem; }
    </style>
</head>
<body>

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

    <h2 class="mb-4 fw-semibold">Invoice Report</h2>

    <!-- Date Range Filter -->
    <form method="GET" class="row g-3 mb-4">
        <input type="hidden" name="controller" value="reports">
        <input type="hidden" name="action" value="invoiceReport">

        <div class="col-md-4">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" 
                   value="<?= htmlspecialchars($start_date) ?>" required>
        </div>

        <div class="col-md-4">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date" 
                   value="<?= htmlspecialchars($end_date) ?>" required>
        </div>

        <div class="col-md-4 d-flex align-items-end">
            <button type="submit" class="btn btn-primary w-100">Search</button>
        </div>
    </form>

    <!-- Invoice Table -->
    <div class="table-responsive shadow-sm rounded">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Invoice Number</th>
                    <th>Date</th>
                    <th>Customer</th>
                    <th>Customer District</th>
                    <th>Item Count</th>
                    <th>Invoice Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($invoices)): ?>
                    <?php foreach ($invoices as $index => $inv): ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= htmlspecialchars($inv['invoice_number']) ?></td>
                            <td><?= htmlspecialchars($inv['invoice_date']) ?></td>
                            <td><?= htmlspecialchars($inv['customer_name']) ?></td>
                            <td><?= htmlspecialchars($inv['customer_district']) ?></td>
                            <td><?= $inv['item_count'] ?></td>
                            <td><?= number_format($inv['total_amount'], 2) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center text-muted">No invoices found for this date range.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
