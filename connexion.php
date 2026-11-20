<<<<<<< HEAD
<?php
// ==========================================================
// EXERCICE 7.1 : CONNEXION À LA BASE DE DONNÉES VIA PDO
// ==========================================================
 
$host = 'localhost';
$dbname = 'imc_db';
$username = 'root';
$password = ''; // Vide par défaut sur XAMPP
 
try {
    // TODO 1 : Instancier l'objet $pdo avec le DSN mysql, charset=utf8mb4
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $password
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    // TODO 2 : Configurer le mode d'erreur sur PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
=======
<?php
// ==========================================================
// EXERCICE 7.1 : CONNEXION À LA BASE DE DONNÉES VIA PDO
// ==========================================================
 
$host = 'localhost';
$dbname = 'imc_db';
$username = 'root';
$password = ''; // Vide par défaut sur XAMPP
 
try {
    // TODO 1 : Instancier l'objet $pdo avec le DSN mysql, charset=utf8mb4
    
    // TODO 2 : Configurer le mode d'erreur sur PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
>>>>>>> af50089fb14814c45fce27c06f178ce76183e49c
