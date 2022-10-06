/**
 *  Projet : Voila! Website
 *  Détail : Js Porte-folio
 *  Auteur : Joao Araribá
 *  Date : 15.05.2022 v1
 */

// Variables de Elements HTML
const smallFigure = document.getElementsByClassName('smallFigure');
const bigFigure = document.getElementsByClassName('bigFigure');

const figure0 = document.getElementById('figure0');
const figure1 = document.getElementById('figure1');
const figure2 = document.getElementById('figure2');
const figure3 = document.getElementById('figure3');


figure0.addEventListener('click', () => change(figure0));
figure1.addEventListener('click', () => change(figure1));
figure2.addEventListener('click', () => change(figure2));
figure3.addEventListener('click', () => change(figure3));

/**
 * Change la position des figures et affiche ou enlève les figcptions selon la classe des figures.
 *
 * @param {HTMLElement} figureId Element HTML sur lequel l'utilisateur a cliqué.
 */
function change(figureId) {
    if (figureId.className != 'bigFigure') {

        bigFigure[0].className = 'smallFigure';
        // bigFigure[0].classList.toggle('bigFigure');
        figureId.className = 'bigFigure';
        window.scrollTo(0, 150);

        console.log(figureId);

    }

}


// let figureGrand = document.getElementById("figure1");
// let imgGrand = document.getElementById("img1");
// let pGrand = document.getElementById("p1");

// function figure(info) {
//     if (document.querySelector('html').clientWidth tabindex="22" >= 768) {

//         let figurePetit = document.getElementById("figure" + info);
//         let imgPetit = document.getElementById("img" + info);
//         let pPetit = document.getElementById("p" + info);

//         window.scrollTo(0, 0);

//         figureGrand.style.order = info;
//         figurePetit.style.order = 1;
//         figurePetit.style.width tabindex="22" = "90%";
//         figurePetit.style.height = "40%";

//         imgPetit.style.height = "50%";
//         imgGrand.style.height = "100%";

//         figureGrand.style.width tabindex="22" = "45%";
//         figureGrand.style.height = "15%";

//         switch (figureGrand.id) {
//             case "figure1":
//                 pPetit.style.display = "inline";
//                 pGrand.style.display = "none";
//                 break;
//             case "figure2":
//                 pPetit.style.display = "inline";
//                 pGrand.style.display = "none";
//                 break;
//             case "figure3":
//                 pPetit.style.display = "inline";
//                 pGrand.style.display = "none";
//                 break;
//             case "figure4":
//                 pPetit.style.display = "inline";
//                 pGrand.style.display = "none";
//                 break;
//             case "figure5":
//                 pPetit.style.display = "inline";
//                 pGrand.style.display = " none";
//                 break;
//             case "figure6":
//                 pPetit.style.display = "inline";
//                 pGrand.style.display = "none";
//                 break;
//             case "figure7":
//                 pPetit.style.display = "inline";
//                 pGrand.style.display = "none";
//                 break;
//         }
//         pGrand = pPetit;
//         figureGrand = figurePetit;
//         imgGrand = imgPetit;
//     } else {
//         let figurePetit = document.getElementById("figure" + info);
//         let imgPetit = document.getElementById("img" + info);
//         let pPetit = document.getElementById("p" + info)

//         // figurePetit.style.height = "25%";

//         // imgPetit.style.height = "50%";
//         // imgGrand.style.height = "100%"

//         // figureGrand.style.height = "15%";

//         switch (figureGrand.id) {
//             case "figure1":
//                 pPetit.style.display = "inline";
//                 pGrand.style.display = "none";
//                 break;
//             case "figure2":
//                 pPetit.style.display = "inline";
//                 pGrand.style.display = "none";
//                 break;
//             case "figure3":
//                 pPetit.style.display = "inline";
//                 pGrand.style.display = "none";
//                 break;
//             case "figure4":
//                 pPetit.style.display = "inline";
//                 pGrand.style.display = "none";
//                 break;
//             case "figure5":
//                 pPetit.style.display = "inline";
//                 pGrand.style.display = "none";
//                 break;
//             case "figure6":
//                 pPetit.style.display = "inline";
//                 pGrand.style.display = "none";
//                 break;
//             case "figure7":
//                 pPetit.style.display = "inline";
//                 pGrand.style.display = "none";
//                 break;
//         }
//         pGrand = pPetit;
//         figureGrand = figurePetit;
//         imgGrand = imgPetit;
//     }
// }