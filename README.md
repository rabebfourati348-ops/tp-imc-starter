<<<<<<< HEAD
# TP — Calculateur d'IMC

## Partie B : Base de données & PHP/PDO

**ISTMT · Université de Tunis El Manar**
**Enseignante : Dr Marwa Ben Ammar**

---

## Présentation du TP

Bienvenue dans l'équipe technique du centre de nutrition ! Votre mission consiste à connecter une interface Web existante à une base de données MySQL afin de sauvegarder, consulter et sécuriser l'historique des mesures des patients. Ce TP vous permettra de mettre en pratique les notions de développement Web côté serveur, de bases de données relationnelles et de gestion de versions avec Git et GitHub.

### Objectifs pédagogiques

À la fin de ce TP, vous serez capables de :
- Concevoir et manipuler une base de données relationnelle avec MySQL.
- Écrire des requêtes SQL (`INSERT`, `SELECT`, `JOIN`, fonctions d'agrégation).
- Établir une connexion entre PHP et MySQL avec PDO.
- Développer des fonctionnalités CRUD.
- Appliquer des mécanismes de sécurité contre les injections SQL et les attaques XSS.
- Utiliser Git et GitHub pour gérer les versions d'un projet informatique.
- Enregistrer et partager les modifications avec les commandes Git.

### Technologies et outils utilisés

- HTML5, CSS3 et JavaScript.
- PHP et PDO.
- MySQL et phpMyAdmin.
- Git et GitHub.
- Visual Studio Code.
- XAMPP.

---

# Mise en route (5 min)

## Étape 1 — Récupération du projet avec GitHub

Chaque étudiant doit disposer de son propre compte GitHub.
1. Accéder au repository fourni par l'enseignante.
2. Cliquer sur **Fork** pour créer une copie personnelle du projet sur son compte GitHub.
3. Vérifier que le repository a bien été créé dans son propre compte.

## Étape 2 — Préparation de l'environnement local

1. Installer Git si nécessaire : [https://git-scm.com/](https://git-scm.com/)
2. Installer XAMPP et Visual Studio Code si nécessaire.
3. Ouvrir Git Bash ou le terminal de VS Code.
4. Se déplacer dans le dossier `C:\xampp\htdocs\` :
```bash
cd C:/xampp/htdocs
```
5. Cloner son propre repository GitHub (et non celui de l'enseignante) :
```bash
git clone https://github.com/VOTRE-NOM-GITHUB/tp-imc-starter.git
```
6. Accéder au dossier du projet :
```bash
cd tp-imc-starter
```
7. Ouvrir le projet dans Visual Studio Code :
```bash
code .
```

## Étape 3 — Lancement de l'application

- Démarrer **Apache** et **MySQL** depuis le panneau de contrôle XAMPP.
- Ouvrir le navigateur Web.
- Tester l'application à l'adresse : `http://localhost/tp-imc-starter/index.php`

**Important :** chaque étudiant travaille sur sa propre copie locale et son propre repository GitHub. Les modifications seront enregistrées progressivement avec Git.

---

# Sprint 1 : Base de données & SQL (30 min)

### Exercice 5 — Concevoir la base avec phpMyAdmin

**Objectif :** concevoir et créer une base de données relationnelle comportant deux tables, une clé primaire et une clé étrangère.

#### Travail demandé

- [ ] **1.** Dans phpMyAdmin (`http://localhost/phpmyadmin`), créez la base `imc_db` avec l'interclassement `utf8mb4_general_ci`.
- [ ] **2.** Créez la table `personnes` :

| Champ | Type | Contraintes |
| -------- | ------------- | ---------------------------- |
| `id` | `INT` | Clé primaire, auto-incrément |
| `nom` | `VARCHAR(50)` | `NOT NULL` |
| `prenom` | `VARCHAR(50)` | `NOT NULL` |

- [ ] **3.** Créez la table `mesures` (moteur InnoDB) :

| Champ | Type | Contraintes |
| ------------- | -------------- | ---------------------------------------------- |
| `id` | `INT` | Clé primaire, auto-incrément |
| `personne_id` | `INT` | `NOT NULL`, clé étrangère vers `personnes(id)` |
| `poids` | `DECIMAL(5,1)` | `NOT NULL` |
| `taille` | `DECIMAL(3,2)` | `NOT NULL` |
| `imc` | `DECIMAL(4,1)` | `NOT NULL` |
| `categorie` | `VARCHAR(20)` | `NOT NULL` |
| `date_mesure` | `DATETIME` | Valeur par défaut : `CURRENT_TIMESTAMP` |

- [ ] **4.** Définissez la clé étrangère `mesures.personne_id → personnes.id` (onglet « Vue relationnelle ») avec l'action `ON DELETE CASCADE`, puis ouvrez le « Concepteur » pour vérifier le schéma.
- [ ] **5.** Insérez les données de test ci-dessous, puis exportez la structure et les données dans le fichier `imc_db.sql` à la racine du projet.

#### Données à insérer

| Table | Valeurs |
| ----------- | --------------------------------------------------------------------------- |
| `personnes` | `('Ben Salah', 'Amine')` ; `('Trabelsi', 'Sana')` ; `('Gharbi', 'Youssef')` |
| `mesures` | Personne 1 : `72.5` kg, `1.75` m, `23.7`, `'Normal'` |
| | Personne 1 : `80.0` kg, `1.75` m, `26.1`, `'Surpoids'` |
| | Personne 2 : `52.0` kg, `1.68` m, `18.4`, `'Sous-poids'` |
| | Personne 2 : `58.0` kg, `1.68` m, `20.5`, `'Normal'` |
| | Personne 3 : `95.0` kg, `1.72` m, `32.1`, `'Obésité'` |

### Initiation à Git — Premier enregistrement

Après la création de la base de données et du fichier `imc_db.sql`, enregistrez votre travail sur GitHub. Dans le terminal de VS Code, exécutez :

```bash
git status
git add .
git commit -m "feat: creation base et structure SQL"
git push
```

**À retenir :**
- `git status` : vérifier les fichiers modifiés.
- `git add .` : préparer les modifications.
- `git commit` : enregistrer une nouvelle version localement.
- `git push` : envoyer les modifications vers votre repository GitHub.

---

# Sprint 2 : Connexion PHP / PDO (40 min)

### Exercice 7 — Rendre l'application dynamique

**Objectif :** connecter l'application Web à la base MySQL en utilisant PHP et PDO.

#### Travail demandé

- [ ] Compléter `connexion.php` pour établir la connexion PDO à `imc_db`.
- [ ] Compléter `index.php` pour charger les patients depuis la table `personnes` dans le `<select>` et afficher l'historique dans le `<table>`.
- [ ] Compléter `ajouter.php` pour calculer l'IMC côté serveur, insérer la mesure dans `mesures` et rediriger vers `index.php`.
- [ ] Compléter `supprimer.php` pour supprimer une mesure via son `id` et rediriger vers `index.php`.

### Git — Deuxième enregistrement

Après avoir testé les fonctionnalités PHP/PDO :

```bash
git status
git add .
git commit -m "feat: CRUD complet PHP PDO"
git push
```

Vérifiez sur votre compte GitHub que les dernières modifications ont bien été envoyées.

---

# Sprint 3 : Défi Sécurité « Hack & Fix » (20 min)

### Exercice 8 — Blindage de l'application

**Objectif :** identifier et corriger une vulnérabilité courante dans une application Web.

#### Travail demandé

- [ ] **Test XSS :** Insérer un patient nommé `<script>alert('Piraté !')</script>` dans la table `personnes` via phpMyAdmin et recharger `index.php`.
- [ ] **Fix XSS :** Protéger tous les affichages dans `index.php` avec `htmlspecialchars()`.

### Git — Livraison finale

Après avoir terminé les corrections de sécurité :
1. Vérifier les fichiers modifiés avec `git status`.
2. Enregistrer les modifications avec `git add .` et `git commit -m "fix: securisation XSS SQLi et validation serveur"`.
3. Envoyer la dernière version sur votre dépôt GitHub avec `git push`.
=======
# TP — Calculateur d'IMC

## Partie B : Base de données & PHP/PDO

**ISTMT · Université de Tunis El Manar**
**Enseignante : Dr Marwa Ben Ammar**

---

## Présentation du TP

Bienvenue dans l'équipe technique du centre de nutrition ! Votre mission consiste à connecter une interface Web existante à une base de données MySQL afin de sauvegarder, consulter et sécuriser l'historique des mesures des patients. Ce TP vous permettra de mettre en pratique les notions de développement Web côté serveur, de bases de données relationnelles et de gestion de versions avec Git et GitHub.

### Objectifs pédagogiques

À la fin de ce TP, vous serez capables de :
- Concevoir et manipuler une base de données relationnelle avec MySQL.
- Écrire des requêtes SQL (`INSERT`, `SELECT`, `JOIN`, fonctions d'agrégation).
- Établir une connexion entre PHP et MySQL avec PDO.
- Développer des fonctionnalités CRUD.
- Appliquer des mécanismes de sécurité contre les injections SQL et les attaques XSS.
- Utiliser Git et GitHub pour gérer les versions d'un projet informatique.
- Enregistrer et partager les modifications avec les commandes Git.

### Technologies et outils utilisés

- HTML5, CSS3 et JavaScript.
- PHP et PDO.
- MySQL et phpMyAdmin.
- Git et GitHub.
- Visual Studio Code.
- XAMPP.

---

# Mise en route (5 min)

## Étape 1 — Récupération du projet avec GitHub

Chaque étudiant doit disposer de son propre compte GitHub.
1. Accéder au repository fourni par l'enseignante.
2. Cliquer sur **Fork** pour créer une copie personnelle du projet sur son compte GitHub.
3. Vérifier que le repository a bien été créé dans son propre compte.

## Étape 2 — Préparation de l'environnement local

1. Installer Git si nécessaire : [https://git-scm.com/](https://git-scm.com/)
2. Installer XAMPP et Visual Studio Code si nécessaire.
3. Ouvrir Git Bash ou le terminal de VS Code.
4. Se déplacer dans le dossier `C:\xampp\htdocs\` :
```bash
cd C:/xampp/htdocs
```
5. Cloner son propre repository GitHub (et non celui de l'enseignante) :
```bash
git clone https://github.com/VOTRE-NOM-GITHUB/tp-imc-starter.git
```
6. Accéder au dossier du projet :
```bash
cd tp-imc-starter
```
7. Ouvrir le projet dans Visual Studio Code :
```bash
code .
```

## Étape 3 — Lancement de l'application

- Démarrer **Apache** et **MySQL** depuis le panneau de contrôle XAMPP.
- Ouvrir le navigateur Web.
- Tester l'application à l'adresse : `http://localhost/tp-imc-starter/index.php`

**Important :** chaque étudiant travaille sur sa propre copie locale et son propre repository GitHub. Les modifications seront enregistrées progressivement avec Git.

---

# Sprint 1 : Base de données & SQL (30 min)

### Exercice 5 — Concevoir la base avec phpMyAdmin

**Objectif :** concevoir et créer une base de données relationnelle comportant deux tables, une clé primaire et une clé étrangère.

#### Travail demandé

- [ ] **1.** Dans phpMyAdmin (`http://localhost/phpmyadmin`), créez la base `imc_db` avec l'interclassement `utf8mb4_general_ci`.
- [ ] **2.** Créez la table `personnes` :

| Champ | Type | Contraintes |
| -------- | ------------- | ---------------------------- |
| `id` | `INT` | Clé primaire, auto-incrément |
| `nom` | `VARCHAR(50)` | `NOT NULL` |
| `prenom` | `VARCHAR(50)` | `NOT NULL` |

- [ ] **3.** Créez la table `mesures` (moteur InnoDB) :

| Champ | Type | Contraintes |
| ------------- | -------------- | ---------------------------------------------- |
| `id` | `INT` | Clé primaire, auto-incrément |
| `personne_id` | `INT` | `NOT NULL`, clé étrangère vers `personnes(id)` |
| `poids` | `DECIMAL(5,1)` | `NOT NULL` |
| `taille` | `DECIMAL(3,2)` | `NOT NULL` |
| `imc` | `DECIMAL(4,1)` | `NOT NULL` |
| `categorie` | `VARCHAR(20)` | `NOT NULL` |
| `date_mesure` | `DATETIME` | Valeur par défaut : `CURRENT_TIMESTAMP` |

- [ ] **4.** Définissez la clé étrangère `mesures.personne_id → personnes.id` (onglet « Vue relationnelle ») avec l'action `ON DELETE CASCADE`, puis ouvrez le « Concepteur » pour vérifier le schéma.
- [ ] **5.** Insérez les données de test ci-dessous, puis exportez la structure et les données dans le fichier `imc_db.sql` à la racine du projet.

#### Données à insérer

| Table | Valeurs |
| ----------- | --------------------------------------------------------------------------- |
| `personnes` | `('Ben Salah', 'Amine')` ; `('Trabelsi', 'Sana')` ; `('Gharbi', 'Youssef')` |
| `mesures` | Personne 1 : `72.5` kg, `1.75` m, `23.7`, `'Normal'` |
| | Personne 1 : `80.0` kg, `1.75` m, `26.1`, `'Surpoids'` |
| | Personne 2 : `52.0` kg, `1.68` m, `18.4`, `'Sous-poids'` |
| | Personne 2 : `58.0` kg, `1.68` m, `20.5`, `'Normal'` |
| | Personne 3 : `95.0` kg, `1.72` m, `32.1`, `'Obésité'` |

### Initiation à Git — Premier enregistrement

Après la création de la base de données et du fichier `imc_db.sql`, enregistrez votre travail sur GitHub. Dans le terminal de VS Code, exécutez :

```bash
git status
git add .
git commit -m "feat: creation base et structure SQL"
git push
```

**À retenir :**
- `git status` : vérifier les fichiers modifiés.
- `git add .` : préparer les modifications.
- `git commit` : enregistrer une nouvelle version localement.
- `git push` : envoyer les modifications vers votre repository GitHub.

---

# Sprint 2 : Connexion PHP / PDO (40 min)

### Exercice 7 — Rendre l'application dynamique

**Objectif :** connecter l'application Web à la base MySQL en utilisant PHP et PDO.

#### Travail demandé

- [ ] Compléter `connexion.php` pour établir la connexion PDO à `imc_db`.
- [ ] Compléter `index.php` pour charger les patients depuis la table `personnes` dans le `<select>` et afficher l'historique dans le `<table>`.
- [ ] Compléter `ajouter.php` pour calculer l'IMC côté serveur, insérer la mesure dans `mesures` et rediriger vers `index.php`.
- [ ] Compléter `supprimer.php` pour supprimer une mesure via son `id` et rediriger vers `index.php`.

### Git — Deuxième enregistrement

Après avoir testé les fonctionnalités PHP/PDO :

```bash
git status
git add .
git commit -m "feat: CRUD complet PHP PDO"
git push
```

Vérifiez sur votre compte GitHub que les dernières modifications ont bien été envoyées.

---

# Sprint 3 : Défi Sécurité « Hack & Fix » (20 min)

### Exercice 8 — Blindage de l'application

**Objectif :** identifier et corriger une vulnérabilité courante dans une application Web.

#### Travail demandé

- [ ] **Test XSS :** Insérer un patient nommé `<script>alert('Piraté !')</script>` dans la table `personnes` via phpMyAdmin et recharger `index.php`.
- [ ] **Fix XSS :** Protéger tous les affichages dans `index.php` avec `htmlspecialchars()`.

### Git — Livraison finale

Après avoir terminé les corrections de sécurité :
1. Vérifier les fichiers modifiés avec `git status`.
2. Enregistrer les modifications avec `git add .` et `git commit -m "fix: securisation XSS SQLi et validation serveur"`.
3. Envoyer la dernière version sur votre dépôt GitHub avec `git push`.
>>>>>>> af50089fb14814c45fce27c06f178ce76183e49c
