<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=basicCMS', $user, $password, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
