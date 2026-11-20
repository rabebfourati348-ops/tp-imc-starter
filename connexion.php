<?php
try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=imc_db;charset=utf8mb4",
        "root", "",
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données.");
}
