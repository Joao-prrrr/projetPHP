// Projet : Voila! - Website
// Détail : page principale
// Auteur : Joao Araribá
// Date : 22.04.2022 v1

// Variables - HTML Elements
// HTML Element body
const body = document.querySelector("body");
// aside anecdote
const anecdote = document.getElementById("anecdote");
// Bouton de la div pour ouvrir le aside 'anecdote'
const btnDiv = document.getElementById("btnDiv");
// Bouton de la div pour ouvrir le aside 'anecdote'
const flecheAnec = document.getElementById("flecheAnec");
// Variable qui permet de savoir si le bouton a été appuyé ou pas
let turnOnOff = true;
// Functions calls
//AddeventListener de btndiv qui appelle openCloseAnecdote
btnDiv.addEventListener('click', openCloseAnecdote);

// Functions
/**
 * Function principale qui permet le bon functionnement de la page
 */
function openCloseAnecdote() {
    afficheAnec();
    changeBtnStyle();
}

/**
 * Affiche et efface l'aside anecdote en function de 'turnOnOff'
 *
 */
function afficheAnec() {
    if (turnOnOff) {
        anecdote.style.left = '10px';
        anecdote.style.position = 'relative';
    } else {
        anecdote.style.left = '-30000px';
        anecdote.style.position = 'absolute';
    }
}

/**
 * Change le style du bouton 'anecdote' et assigne true ou false à turnOnOff selon si 
 * c'est pour fermer l'anecdote ou pour ouvrir.
 */
function changeBtnStyle() {
    /* width: 0px;
    height: 0px;
    border-left: 20px solid transparent;
	border-right: 20px solid transparent;
	border-top: 25px solid rgba(8, 67, 157, 0.9); */
    if (turnOnOff) {
        flecheAnec.style.border = 'none';
        flecheAnec.style.borderLeft = '20px solid transparent';
        flecheAnec.style.borderRight = '20px solid transparent';
        flecheAnec.style.borderTop = '25px solid rgba(8, 67, 157, 0.9)';
        flecheAnec.style.borderRadius = '0px';
        flecheAnec.style.width = '0px';
        flecheAnec.style.height = '0px';
        btnDiv.style.width = '100%';
        turnOnOff = false;
    } else {
        flecheAnec.style.borderLeft = 'none';
        flecheAnec.style.borderRight = 'none';
        flecheAnec.style.borderTop = 'none';
        flecheAnec.style.borderRadius = '20px';
        flecheAnec.style.width = '30px';
        flecheAnec.style.height = '30px';
        flecheAnec.style.border = 'solid 5px rgba(8, 67, 157, 0.9)';
        if (body.clientWidth <= 1311) {
            btnDiv.style.width = '65%';
        } else {
            btnDiv.style.width = '30%';
        }
        turnOnOff = true;

    }

}