<?php

class Mysql
{
    protected $host;

    protected $db;

    protected $user;

    protected $password;

    protected $charset;

    protected $dsn;

    protected $opt;

    protected $pdo;

    public function __construct()
    {
        $this->host = 'localhost';

        $this->db = 'talgat065';

        $this->user = 'talgat065';

        $this->password = 'Talgat065';

        $this->charset = 'utf8';

        $this->dsn = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";

        $this->opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        $this->pdo = new PDO($this->dsn, $this->user, $this->password, $this->opt);
    }

    public function getAll($table, $sort = 'id', $limit = 0)
    {
        return $this->pdo->query("SELECT * FROM $table ORDER BY $sort LIMIT $limit,3")->fetchAll();
    }

    public function insert($table, $data)
    {
        $user_name = $data['user_name'];

        $email = $data['email'];

        $text = $data['text'];

        $image_path = $data['image_path'];

        $string = "INSERT INTO $table(user_name, email, text, image_path) VALUES('$user_name', '$email', '$text', '$image_path')";

        if (! $this->pdo->query($string)) {
            return false;
        }
    }

    public function getOne($table, $id)
    {
        return $this->pdo->query("SELECT * FROM $table WHERE id='$id'")->fetchAll();
    }

    public function update($table, $data)
    {
        $id = $data['id'];

        $text = $data['text'];

        $status = $data['status'];

        return $this->pdo->query("UPDATE $table SET text='$text', status='$status' WHERE id='$id'");
    }
}
