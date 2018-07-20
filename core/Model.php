<?php
namespace Core;
use App\Database\Mysql;

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
