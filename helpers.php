<?php
function connect($user, $password) {
    try {
        return new PDO('mysql:host=localhost;dbname=basicCMS', $user, $password);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
}

   

