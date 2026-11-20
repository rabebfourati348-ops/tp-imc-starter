<?php
require 'connexion.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if ($id) {
    $stmt = $pdo->prepare("DELETE FROM mesures WHERE id = :id");
    $stmt->execute([':id' => $id]);
}
header('Location: index.php');
exit;
