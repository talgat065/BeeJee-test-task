<?php

namespace Core;

use PDO;

abstract class DB
{
    protected $charset;

    protected $password;

    protected $opt;

    protected $host;

    protected $pdo;

    protected $user;

    protected $db;

    protected $dsn;

    public function __construct()
    {
        $this->host = 'localhost';

        $this->db = 'mvc_framework';

        $this->user = 'homestead';

        $this->password = 'secret';

        $this->charset = 'utf8';

        $this->dsn = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";

        $this->opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        $this->pdo = new PDO($this->dsn, $this->user, $this->password, $this->opt);
    }
}
