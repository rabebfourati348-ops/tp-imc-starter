<?php
require 'connexion.php';

$personnes = $pdo->query("SELECT id, nom, prenom FROM personnes ORDER BY nom")->fetchAll();

$mesures = $pdo->query(
    "SELECT m.id, p.nom, p.prenom, m.poids, m.taille, m.imc, m.categorie, m.date_mesure
     FROM mesures m
     JOIN personnes p ON p.id = m.personne_id
     ORDER BY m.date_mesure DESC"
)->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculateur d'IMC</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <header>
        <h1>Calculateur d'IMC</h1>
    </header>
 
    <main>
        <section>
            <h2>Saisie</h2>
            <!-- TODO 3 (Ex 7) : Ajouter action="ajouter.php" et method="POST" sur le formulaire -->
            <form class="imc" action="ajouter.php" method="POST">
                <label>
                    Personne
                    <select name="personne_id" required>
                        <?php foreach ($personnes as $p): ?>
                        <option value="<?= (int)$p['id'] ?>">
                        <?= htmlspecialchars($p['prenom'] . ' ' . $p['nom'], ENT_QUOTES, 'UTF-8') ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </label>
 
                <label>
                    Poids (kg)
                    <input id="imc-poids" name="poids" type="number" step="0.1" min="1" max="500" required />
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
                    <?php foreach ($mesures as $m): ?>
                    <tr>
                        <td><?= htmlspecialchars($m['prenom'] . ' ' . $m['nom'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($m['poids'], ENT_QUOTES, 'UTF-8') ?> kg</td>
                        <td><?= htmlspecialchars($m['taille'], ENT_QUOTES, 'UTF-8') ?> m</td>
                        <td><?= htmlspecialchars($m['imc'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($m['categorie'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars($m['date_mesure'], ENT_QUOTES, 'UTF-8') ?></td>
                        <td><a href="supprimer.php?id=<?= (int)$m['id'] ?>"
                            onclick="return confirm('Supprimer cette mesure ?')">Supprimer</a></td>
                    </tr>
                    <?php endforeach; ?> 
                </tbody>
            </table>
        </section>
    </main>
 
    <footer>
        <p>Centre de nutrition — ISTMT</p>
    </footer>
</body>
</html>
