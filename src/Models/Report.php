<?php

namespace Models;

use Core\Model;

class Report extends Model
{

    public function getInvoiceReport(string $start, string $end): array
    {
        $sql = "SELECT i.invoice_number, i.invoice_date, 
                    CONCAT(c.first_name,' ',c.last_name) AS customer_name,
                    c.district AS customer_district,
                    COUNT(ii.id) AS item_count, 
                    i.total_amount
                FROM invoices i
                LEFT JOIN customers c ON i.customer_id = c.id
                LEFT JOIN invoice_items ii ON i.id = ii.invoice_id
                WHERE i.invoice_date BETWEEN :start AND :end
                GROUP BY i.id
                ORDER BY i.invoice_date DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['start' => $start, 'end' => $end]);
        return $stmt->fetchAll();
    }



    public function getInvoiceItemReport(string $start_date, string $end_date): array
    {
        $sql = "
            SELECT 
                i.invoice_number,
                i.invoice_date,
                CONCAT(c.first_name, ' ', c.last_name) AS customer_name,
                it.item_name,
                it.item_code,
                ic.name AS item_category,
                ii.unit_price
            FROM invoices i
            JOIN customers c ON i.customer_id = c.id
            JOIN invoice_items ii ON ii.invoice_id = i.id
            JOIN items it ON ii.item_id = it.id
            JOIN item_categories ic ON it.item_category_id = ic.id
            WHERE i.invoice_date BETWEEN :start_date AND :end_date
            ORDER BY i.invoice_date DESC, i.invoice_number
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['start_date' => $start_date, 'end_date' => $end_date]);
        return $stmt->fetchAll();
    }


    public function getItemReport(): array
    {
        $sql = "
            SELECT 
                it.item_name,
                ic.name AS item_category,
                isc.name AS item_subcategory,
                it.quantity
            FROM items it
            LEFT JOIN item_categories ic ON it.item_category_id = ic.id
            LEFT JOIN item_subcategories isc ON it.item_subcategory_id = isc.id
            ORDER BY ic.name, isc.name, it.item_name
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
