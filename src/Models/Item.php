<?php

namespace Models;

use Core\Model;

class Item extends Model
{
    protected string $table = "items";

    public function getAll(): array
    {
        $sql = "SELECT i.*, 
                       c.name AS category_name, 
                       s.name AS subcategory_name
                FROM items i
                LEFT JOIN item_categories c ON i.item_category_id = c.id
                LEFT JOIN item_subcategories s ON i.item_subcategory_id = s.id
                ORDER BY i.id DESC";

        return $this->db->query($sql)->fetchAll();
    }

    public function getCategories(): array
    {
        return $this->db->query("SELECT * FROM item_categories ORDER BY name")->fetchAll();
    }

    public function getSubcategories(): array
    {
        return $this->db->query("SELECT * FROM item_subcategories ORDER BY name")->fetchAll();
    }

    public function find(int $id): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->execute([$id]);
        $result = $stmt->fetch();

        return $result ?: null;
    }

    public function create(array $data): bool
    {
        $sql = "INSERT INTO items 
                (item_code, item_name, item_category_id, item_subcategory_id, quantity, unit_price)
                VALUES (:item_code, :item_name, :item_category_id, :item_subcategory_id, :quantity, :unit_price)";

        return $this->db->prepare($sql)->execute($data);
    }

    public function updateItem(int $id, array $data): bool
    {
        $sql = "UPDATE items 
                SET item_code = :item_code,
                    item_name = :item_name,
                    item_category_id = :item_category_id,
                    item_subcategory_id = :item_subcategory_id,
                    quantity = :quantity,
                    unit_price = :unit_price
                WHERE id = :id";

        $data["id"] = $id;

        return $this->db->prepare($sql)->execute($data);
    }

    public function deleteItem(int $id): bool
    {
        return $this->db->prepare("DELETE FROM items WHERE id = ?")->execute([$id]);
    }
}
