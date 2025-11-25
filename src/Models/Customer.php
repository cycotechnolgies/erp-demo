<?php

namespace Models;

use Core\Model;
use PDO;

class Customer extends Model
{
    protected string $table = "customers";

    public function getAll(): array
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY id DESC";
        return $this->db->query($sql)->fetchAll();
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
        $sql = "INSERT INTO {$this->table} (title, first_name, last_name, contact_number, district)
                VALUES (:title, :first_name, :last_name, :contact_number, :district)";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    public function updateCustomer(int $id, array $data): bool
    {
        $sql = "UPDATE {$this->table} SET 
                    title = :title,
                    first_name = :first_name,
                    last_name = :last_name,
                    contact_number = :contact_number,
                    district = :district
                WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $data["id"] = $id;

        return $stmt->execute($data);
    }

    public function deleteCustomer(int $id): bool
    {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
