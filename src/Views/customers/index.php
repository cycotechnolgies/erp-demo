<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customers</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>

<body>

<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/erp-demo/index.php">ERP System</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link active" href="/erp-demo/index.php?controller=customers&action=index">Customers</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/erp-demo/index.php?controller=items&action=index">Items</a>
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
        <h2 class="fw-semibold mb-0">Customer List</h2>

        <a href="/erp-demo/index.php?controller=customers&action=create"
           class="btn btn-primary">
           + Add Customer
        </a>
    </div>

    <!-- Responsive Table Wrapper -->
    <div class="table-responsive shadow-sm rounded">
        <table class="table table-striped table-hover align-middle mb-0">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Contact number</th>
                    <th>District</th>
                    <th class="text-center" style="width:150px;">Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($customers as $c): ?>
                    <tr>
                        <td><?= $c["id"] ?></td>
                        <td><?= htmlspecialchars($c["title"]) ?></td>
                        <td><?= htmlspecialchars($c["first_name"]) ?></td>
                        <td><?= htmlspecialchars($c["last_name"]) ?></td>
                        <td><?= htmlspecialchars($c["contact_number"]) ?></td>
                        <td><?= htmlspecialchars($c["district"]) ?></td>

                        <td class="text-center">
                            <a href="/erp-demo/index.php?controller=customers&action=edit&id=<?= $c['id'] ?>"
                               class="btn btn-sm btn-warning me-1">
                                Edit
                            </a>

                            <a onclick="return confirm('Delete this customer?')"
                               href="/erp-demo/index.php?controller=customers&action=delete&id=<?= $c['id'] ?>"
                               class="btn btn-sm btn-danger">
                                Delete
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>

        </table>
    </div>

</div>

<script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
</script>

</body>
</html>
