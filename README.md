# ERP System (PHP & MySQL)

A simple **ERP system** developed in **PHP** with **MySQL** backend, designed to manage Customers, Items, and generate various Reports. The system follows the **MVC architecture** and uses **Bootstrap 5** for a responsive UI.

---

## Features

### 1. Customer Management
- Register and store customer data.
- View a list of all customers.
- Form validation for all required fields.
- Fields included:
  - Title (Mr/Mrs/Miss/Dr)
  - First Name
  - Last Name
  - Contact Number
  - District

### 2. Item Management
- Register and store item details.
- View a list of all items.
- Form validation for all required fields.
- Fields included:
  - Item Code
  - Item Name
  - Item Category (selectable)
  - Item Subcategory (selectable)
  - Quantity
  - Unit Price
- Categories and subcategories are linked dynamically.

### 3. Reporting
The system provides three main reports:

#### a. Invoice Report
- Search invoices by **date range**.
- Displays:
  - Invoice Number
  - Invoice Date
  - Customer Name
  - Customer District
  - Item Count
  - Invoice Amount

#### b. Invoice Item Report
- Search invoice items by **date range**.
- Displays:
  - Invoice Number
  - Invoice Date
  - Customer Name
  - Item Name
  - Item Code
  - Item Category
  - Item Unit Price

#### c. Item Report
- Lists all items without duplicates.
- Displays:
  - Item Name
  - Item Category
  - Item Subcategory
  - Item Quantity

---

## Technology Stack

- **Backend:** PHP 8+  
- **Database:** MySQL 
- **Frontend:** Bootstrap 5, HTML5, CSS3  
- **Architecture:** MVC (Model-View-Controller)  
- **Server:** XAMPP 

---

## Project Structure
```bash
erp-demo/
│
├─ src/
│ ├─ Controllers/ # Controller classes
│ ├─ Models/ # Database models
│ ├─ Views/ # HTML/PHP views
│ └─ Core/ # Router, Base Model, Base Controller
│
├─ index.php # Front controller
├─ sql/schema.sql # Database schema and demo data
└─ README.md
```
---

## Installation & Setup

1. **Clone the repository** into your web server directory (e.g., `htdocs` for XAMPP):

```bash
git clone https://github.com/cycotechnolgies/erp-demo.git
```
---

## Create the database:

- Open phpMyAdmin or MySQL CLI.

- Run sql/schema.sql to create the database, tables, and demo data.

## Configure Database Connection:

- Open src/Core/Database.php

- Set your database host, name, username, and password.

```bash
$host = 'localhost';
$db   = 'erp';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
```
---
# Screenshots

<img width="1364" height="605" alt="image" src="https://github.com/user-attachments/assets/794dc4f2-aec2-47b7-9923-a795b18f4ff6" />

<img width="1360" height="609" alt="image" src="https://github.com/user-attachments/assets/66f61e6c-e981-408c-93d6-19a368be59da" />

<img width="1342" height="581" alt="image" src="https://github.com/user-attachments/assets/a0b1cce0-f438-488c-a3b8-560be3829724" />

<img width="1351" height="513" alt="image" src="https://github.com/user-attachments/assets/209fdd70-8a56-4220-ad1b-743abdaa56dc" />

<img width="1316" height="576" alt="image" src="https://github.com/user-attachments/assets/29b04678-930a-435f-ab3b-5636048f18e1" />

<img width="1318" height="586" alt="image" src="https://github.com/user-attachments/assets/5d8bc919-f87d-4bb4-a8c8-d1afce5c9eaa" />

<img width="1238" height="589" alt="image" src="https://github.com/user-attachments/assets/8ce7d9eb-7ebc-471c-b132-13499fc8564d" />








