<?php

namespace Controllers;

use Core\Controller;
use Models\Item;

class ItemsController extends Controller
{
    private Item $item;

    public function __construct()
    {
        $this->item = new Item();
    }

    public function index()
    {
        $items = $this->item->getAll();
        $this->view("items/index", ["items" => $items]);
    }

    public function create()
{
    // Fetch categories and subcategories
    $categories    = $this->item->getCategories();
    $subcategories = $this->item->getSubcategories();


    // Pass data to the view
    $this->view("items/create", [
        "categories"    => $categories,
        "subcategories" => $subcategories,
    ]);
}


    public function store()
    {
        $data = [
            "item_code"          => trim($_POST["item_code"]),
            "item_name"          => trim($_POST["item_name"]),
            "item_category_id"   => $_POST["item_category_id"],
            "item_subcategory_id"=> $_POST["item_subcategory_id"],
            "quantity"           => $_POST["quantity"],
            "unit_price"         => $_POST["unit_price"],
        ];

        $this->item->create($data);

        header("Location: /erp-demo/index.php?controller=items&action=index");
        exit;
    }

    public function edit()
    {
        $id = (int)$_GET["id"];
        $item = $this->item->find($id);

        $categories = $this->item->getCategories();
        $subcategories = $this->item->getSubcategories();

        $this->view("items/edit", [
            "item" => $item,
            "categories" => $categories,
            "subcategories" => $subcategories
        ]);
    }

    public function update()
    {
        $id = (int)$_GET["id"];

        $data = [
            "item_code"          => trim($_POST["item_code"]),
            "item_name"          => trim($_POST["item_name"]),
            "item_category_id"   => $_POST["item_category_id"],
            "item_subcategory_id"=> $_POST["item_subcategory_id"],
            "quantity"           => $_POST["quantity"],
            "unit_price"         => $_POST["unit_price"],
        ];

        $this->item->updateItem($id, $data);

        header("Location: /erp-demo/index.php?controller=items&action=index");
        exit;
    }

    public function delete()
    {
        $id = (int)$_GET["id"];
        $this->item->deleteItem($id);

        header("Location: /erp-demo/index.php?controller=items&action=index");
        exit;
    }
}
