<?php

namespace Core;

use Core\Database;
use PDO;

class Model
{
    protected PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }
}
