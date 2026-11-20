<?php
require_once 'connexion.php';
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // TODO 1 (Ex 7) : Récupérer personne_id, poids et taille depuis $_POST
 
    // TODO 2 (Ex 8) : Valider côté serveur que les champs ne sont pas vides et respectent les bornes
    // (personne_id > 0, 20 <= poids <= 300, 0.5 <= taille <= 2.5)
 
    // TODO 3 (Ex 7) : Calculer $imc = round($poids / ($taille * $taille), 1) et déterminer $categorie
 
    // TODO 4 (Ex 7 & 8) : Préparer et exécuter la requête INSERT INTO mesures (...)
}
 
// TODO 5 (Ex 7) : Rediriger vers index.php avec header()
