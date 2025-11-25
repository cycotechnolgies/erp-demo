<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERP Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f7f9fb;
        }
        .nav-link {
            font-weight: 500;
        }
        .dashboard-card {
            transition: 0.2s;
            cursor: pointer;
        }
        .dashboard-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.12);
        }
        .card-icon {
            font-size: 42px;
            opacity: 0.8;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="/erp-demo/index.php">ERP System</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" 
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Header Navigation -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="/erp-demo/index.php?controller=customers&action=index">Customers</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/erp-demo/index.php?controller=items&action=index">Items</a>
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

<!-- Main Dashboard -->
<div class="container py-5">

    <h2 class="text-center mb-4 fw-semibold">Welcome to the ERP Dashboard</h2>

    <div class="row g-4">

        <!-- Customers -->
        <div class="col-12 col-sm-6 col-lg-3">
            <a href="/erp-demo/index.php?controller=customers&action=index" class="text-decoration-none text-dark">
                <div class="card shadow-sm dashboard-card p-3 text-center">
                    <div class="card-icon">👤</div>
                    <h5 class="mt-3">Customers</h5>
                </div>
            </a>
        </div>

        <!-- Items -->
        <div class="col-12 col-sm-6 col-lg-3">
            <a href="/erp-demo/index.php?controller=items&action=index" class="text-decoration-none text-dark">
                <div class="card shadow-sm dashboard-card p-3 text-center">
                    <div class="card-icon">📦</div>
                    <h5 class="mt-3">Items</h5>
                </div>
            </a>
        </div>

        <!-- Invoices -->
        <div class="col-12 col-sm-6 col-lg-3">
            <a href="/erp-demo/index.php?controller=invoices&action=index" class="text-decoration-none text-dark">
                <div class="card shadow-sm dashboard-card p-3 text-center">
                    <div class="card-icon">🧾</div>
                    <h5 class="mt-3">Invoices</h5>
                </div>
            </a>
        </div>

        <!-- Reports -->
        <div class="col-12 col-sm-6 col-lg-3">
            <a href="/erp-demo/index.php?controller=reports&action=index" class="text-decoration-none text-dark">
                <div class="card shadow-sm dashboard-card p-3 text-center">
                    <div class="card-icon">📊</div>
                    <h5 class="mt-3">Reports</h5>
                </div>
            </a>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
