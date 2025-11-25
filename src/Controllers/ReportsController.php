<?php

namespace Controllers;

use Core\Controller;
use Models\Report;

class ReportsController extends Controller
{
    // Show Reports menu
    public function index()
    {
        $this->view('reports/index');
    }

    // Invoice Report
    public function invoiceReport()
    {
        $start_date = $_GET['start_date'] ?? date('Y-m-01'); 
        $end_date   = $_GET['end_date'] ?? date('Y-m-d');     
        $reportModel = new \Models\Report();
        $invoices = $reportModel->getInvoiceReport($start_date, $end_date);

        $this->view('reports/invoice', [
            'invoices'   => $invoices,
            'start_date' => $start_date,
            'end_date'   => $end_date
        ]);
    }


    // Invoice Item Report
    public function invoiceItemReport()
    {
        $start_date = $_GET['start_date'] ?? date('Y-m-01');
        $end_date   = $_GET['end_date']   ?? date('Y-m-d');

        $reportModel = new Report();
        $items = $reportModel->getInvoiceItemReport($start_date, $end_date);

        $this->view('reports/invoice_item', [
            'items'      => $items,
            'start_date' => $start_date,
            'end_date'   => $end_date
        ]);
    }

    // Item Report
    public function itemReport()
    {
        $reportModel = new Report();
        $items = $reportModel->getItemReport();

        $this->view('reports/item', [
            'items' => $items
        ]);
    }
}
