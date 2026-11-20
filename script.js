<<<<<<< HEAD
function categorieIMC(imc) {
    if (imc < 18.5) return 'Sous-poids';
    if (imc < 25) return 'Normal';
    if (imc < 30) return 'Surpoids';
    return 'Obésité';
}

function calculerIMC() {
    const poids = parseFloat(document.querySelector('#imc-poids').value);
    const taille = parseFloat(document.querySelector('#imc-taille').value);

    // Vide, non numérique, nul ou négatif : pas de calcul
    if (!(poids > 0) || !(taille > 0)) {
        return;
    }

    const imc = poids / (taille * taille);

    document.querySelector('#imc-valeur').textContent = imc.toFixed(1);
    document.querySelector('#imc-categorie').textContent = categorieIMC(imc);
}

document.querySelector('#imc-calculer').addEventListener('click', calculerIMC);
=======
function categorieIMC(imc) {
    if (imc < 18.5) return 'Sous-poids';
    if (imc < 25) return 'Normal';
    if (imc < 30) return 'Surpoids';
    return 'Obésité';
}

function calculerIMC() {
    const poids = parseFloat(document.querySelector('#imc-poids').value);
    const taille = parseFloat(document.querySelector('#imc-taille').value);

    // Vide, non numérique, nul ou négatif : pas de calcul
    if (!(poids > 0) || !(taille > 0)) {
        return;
    }

    const imc = poids / (taille * taille);

    document.querySelector('#imc-valeur').textContent = imc.toFixed(1);
    document.querySelector('#imc-categorie').textContent = categorieIMC(imc);
}

document.querySelector('#imc-calculer').addEventListener('click', calculerIMC);
>>>>>>> af50089fb14814c45fce27c06f178ce76183e49c
