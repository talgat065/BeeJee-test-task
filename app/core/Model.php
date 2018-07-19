<?php
require_once 'app/database/Mysql.php';

class Model
{
    protected $mysql;

    protected $table;

    public function __construct()
    {
        $this->mysql = new Mysql();
    }

    public function getData($query, $page)
    {
        return $this->mysql->getAll($this->table, $query, $page - 1);
    }
}
