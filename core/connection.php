<?php

class Connection
{
    public static $pdo;

    public function __construct($user, $password)
    {
        try {
            self::$pdo = new PDO('mysql:host=localhost;dbname=basicCMS', $user, $password);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }   
    }
}
