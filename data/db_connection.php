<?php

require_once 'config.php';

function getConnection(): ?PDO {
    try {
        $conn = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
            DB_USER, DB_PASSWORD
        );
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;

    } catch (PDOException $e) {
        throw new RuntimeException("Connection failed: " . $e->getMessage());
    }
}
