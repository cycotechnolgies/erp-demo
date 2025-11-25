<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Customer</title>
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
                    <a class="nav-link active" href="/erp-demo/index.php?controller=customers&action=index">Customers</a>
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

<!-- MAIN CONTENT -->
<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-semibold mb-0">Edit Customer</h2>
    </div>

    <!-- Card Wrapper -->
    <div class="card shadow-sm">
        <div class="card-body p-4">

            <form method="post" action="/erp-demo/index.php?controller=customers&action=update">

                <input type="hidden" name="id" value="<?= $customer['id'] ?>">

                <div class="row g-3">

                    <!-- Title -->
                    <div class="col-md-4">
                        <label class="form-label">Title</label>
                        <select name="title" class="form-select" required>
                            <option <?= $customer["title"] === "Mr" ? "selected" : "" ?>>Mr</option>
                            <option <?= $customer["title"] === "Mrs" ? "selected" : "" ?>>Mrs</option>
                            <option <?= $customer["title"] === "Miss" ? "selected" : "" ?>>Miss</option>
                            <option <?= $customer["title"] === "Dr" ? "selected" : "" ?>>Dr</option>
                        </select>
                    </div>

                    <!-- First Name -->
                    <div class="col-md-4">
                        <label class="form-label">First name</label>
                        <input type="text" name="first_name" class="form-control"
                               value="<?= htmlspecialchars($customer['first_name']) ?>" required>
                    </div>

                    <!-- Last Name -->
                    <div class="col-md-4">
                        <label class="form-label">Last name</label>
                        <input type="text" name="last_name" class="form-control"
                               value="<?= htmlspecialchars($customer['last_name']) ?>" required>
                    </div>

                    <!-- Contact Number -->
                    <div class="col-md-6">
                        <label class="form-label">Contact number</label>
                        <input type="text" name="contact_number" class="form-control"
                               value="<?= htmlspecialchars($customer['contact_number']) ?>" required>
                    </div>

                    <!-- District -->
                    <div class="col-md-6">
                        <label class="form-label">District</label>
                        <select name="district" class="form-select" required>

                            <?php 
                                $districts = [
                                    "Colombo","Gampaha","Kalutara","Kandy","Matale","Nuwara Eliya",
                                    "Galle","Matara","Hambantota","Jaffna","Kilinochchi","Mannar",
                                    "Vavuniya","Mullaitivu","Batticaloa","Ampara","Trincomalee",
                                    "Kurunegala","Puttalam","Anuradhapura","Polonnaruwa","Badulla",
                                    "Monaragala","Ratnapura","Kegalle"
                                ];
                            ?>

                            <option value="">Select district</option>

                            <?php foreach ($districts as $d): ?>
                                <option value="<?= $d ?>" 
                                    <?= $customer["district"] === $d ? "selected" : "" ?>>
                                    <?= $d ?>
                                </option>
                            <?php endforeach; ?>

                        </select>
                    </div>

                </div>

                <div class="mt-4 d-flex justify-content-end">
                    <button class="btn btn-primary px-4">Update Customer</button>
                </div>

            </form>

        </div>
    </div>

</div>

<script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
</script>

</body>
</html>
