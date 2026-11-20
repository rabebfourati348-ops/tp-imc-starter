 <?php
require 'connexion.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$personne_id = filter_input(INPUT_POST, 'personne_id', FILTER_VALIDATE_INT);
$poids  = filter_input(INPUT_POST, 'poids',  FILTER_VALIDATE_FLOAT);
$taille = filter_input(INPUT_POST, 'taille', FILTER_VALIDATE_FLOAT);

// Validation côté serveur
if (!$personne_id || !$poids || !$taille
    || $poids < 1 || $poids > 500 || $taille < 0.5 || $taille > 2.5) {
    die("Données invalides.");
}

$imc = round($poids / ($taille * $taille), 1);

if ($imc < 18.5)      $categorie = 'Sous-poids';
elseif ($imc < 25)    $categorie = 'Normal';
elseif ($imc < 30)    $categorie = 'Surpoids';
else                  $categorie = 'Obésité';

$stmt = $pdo->prepare(
    "INSERT INTO mesures (personne_id, poids, taille, imc, categorie)
     VALUES (:pid, :poids, :taille, :imc, :cat)"
);
$stmt->execute([
    ':pid' => $personne_id, ':poids' => $poids, ':taille' => $taille,
    ':imc' => $imc, ':cat' => $categorie,
]);

header('Location: index.php');
exit;
