<?php

class Connection
{
    protected $pdo;

    public function __construct ($user, $password)
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=basicCMS', $user, $password);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }   
    }

    public function getPdo()
    {
        return $this->pdo;
    }
}
