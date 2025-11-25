<?php

namespace Controllers;

use Core\Controller;
use Models\Customer;

class CustomersController extends Controller
{
    private Customer $customer;

    public function __construct()
    {
        $this->customer = new Customer();
    }

    public function index()
    {
        $customers = $this->customer->getAll();
        $this->view("customers/index", ["customers" => $customers]);
    }

    public function create()
    {
        $this->view("customers/create");
    }

    public function store()
    {
        $data = [
            "title"          => $_POST["title"],
            "first_name"     => trim($_POST["first_name"]),
            "last_name"      => trim($_POST["last_name"]),
            "contact_number" => trim($_POST["contact_number"]),
            "district"       => trim($_POST["district"]),
        ];

        // Server-side validation
        foreach ($data as $key => $value) {
            if ($value === "") {
                die("All fields are required.");
            }
        }

        $this->customer->create($data);

        header("Location: /erp-demo/index.php?controller=customers&action=index");
        exit;
    }

    public function edit()
    {
        $id = (int) $_GET["id"];
        $customer = $this->customer->find($id);

        if (!$customer) {
            die("Customer not found.");
        }

        $this->view("customers/edit", ["customer" => $customer]);
    }

    public function update()
    {
        $id = (int) $_POST["id"];

        $data = [
            "title"          => $_POST["title"],
            "first_name"     => trim($_POST["first_name"]),
            "last_name"      => trim($_POST["last_name"]),
            "contact_number" => trim($_POST["contact_number"]),
            "district"       => trim($_POST["district"]),
        ];

        $this->customer->updateCustomer($id, $data);

        header("Location: /erp-demo/index.php?controller=customers&action=index");
        exit;
    }

    public function delete()
    {
        $id = (int) $_GET["id"];
        $this->customer->deleteCustomer($id);

        header("Location: /erp-demo/index.php?controller=customers&action=index");
        exit;
    }
}
