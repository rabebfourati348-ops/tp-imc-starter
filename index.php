<?php
require_once 'connexion.php';
 
// TODO 1 (Ex 7) : Récupérer tous les patients de la table 'personnes' dans un tableau $personnes
$personnes = [];
 
// TODO 2 (Ex 7) : Récupérer l'historique des mesures avec le nom du patient (INNER JOIN) dans $mesures
$mesures = [];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculateur d'IMC</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
</head>
<body>
    <header>
        <h1>Calculateur d'IMC</h1>
    </header>
 
    <main>
        <section>
            <h2>Saisie</h2>
            <!-- TODO 3 (Ex 7) : Ajouter action="ajouter.php" et method="POST" sur le formulaire -->
            <form class="imc">
                <label>
                    Personne
                    <select name="personne_id" required>
                        <option value="">-- Choisir --</option>
                        <!-- TODO 4 (Ex 7 & 8) : Boucler sur $personnes pour générer les <option> (n'oubliez pas htmlspecialchars) -->
                    </select>
                </label>
 
                <label>
                    Poids (kg)
                    <input id="imc-poids" name="poids" type="number" step="0.1" min="20" max="300" required />
                </label>
 
                <label>
                    Taille (m)
                    <input id="imc-taille" name="taille" type="number" step="0.01" min="0.5" max="2.5" required />
                </label>
 
                <div>
                    <button id="imc-calculer" type="button">Calculer</button>
                    <button type="submit">Enregistrer la mesure</button>
                </div>
            </form>
        </section>
 
        <section>
            <h2>Résultat</h2>
            <p>Votre IMC : <strong id="imc-valeur">-</strong></p>
            <p>Catégorie : <strong id="imc-categorie">-</strong></p>
        </section>
 
        <section>
            <h2>Historique des mesures</h2>
            <table>
                <thead>
                    <tr>
                        <th>Personne</th>
                        <th>Poids (kg)</th>
                        <th>Taille (m)</th>
                        <th>IMC</th>
                        <th>Catégorie</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- TODO 5 (Ex 7 & 8) : Boucler sur $mesures pour afficher chaque ligne <tr> -->
                    <!-- N'oubliez pas le lien : <a href="supprimer.php?id=...">Supprimer</a> -->
                </tbody>
            </table>
        </section>
    </main>
 
    <footer>
        <p>Centre de nutrition — ISTMT</p>
    </footer>
</body>
</html>
