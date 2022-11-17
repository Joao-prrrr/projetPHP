// Project : Voila! - Website
// Details : JavaScript - Quiz
// Author : Joao Araribá
// Date   : 25.04.2022 v1

//Constantes Html Elements ------------

//Bouton 'Verifier'
const verifierBtn = document.getElementById('verifier');
// Bouton 'reset'
const resetBtn = document.getElementById('resetBtn');
// Input 'nom'
const nom = document.getElementById("name");

//Liste des checkboxes 'premiereUtilite'
const premiereUtilite = [
    document.getElementById("colonisations"),
    document.getElementById("moyenTransport"),
    document.getElementById("fetes"),
    document.getElementById("cargaison")
];

//Liste des radioButtons 'avanceBateau'
const avanceBateau = [
    document.getElementById("courants"),
    document.getElementById("tensionQuille"),
    document.getElementById("depressionVoile"),
    document.getElementById("daufins")
];
//Input 'nautisme'
const nautisme = document.getElementById("nautismeResponse");
//Input 'uniteMesure'
const uniteMesure = document.getElementById("uniteMesure");
//Input 'millesNautique'
const millesNautique = document.getElementById("millesNautique");
//Liste des checkboxes 'sportAutres'
const sportAutres = [
    document.getElementById("surf"),
    document.getElementById("kitesurf"),
    document.getElementById("foil"),
    document.getElementById("skiNautique"),
    document.getElementById("plancheVoile")
];
//Liste des radioButtons 'directionPlanche'
const directionPlanche = [
    document.getElementById("inclinaison"),
    document.getElementById("mat"),
    document.getElementById("corps"),
    document.getElementById("avecMains")
];
//Input 'systemeFoil'
const systemeFoil = document.getElementById("systemeFoil");
//Input 'motInterdit'
const motInterdit = document.getElementById("motInterdit");
//Input 'lblRange'
const lblRange = document.getElementById('lblRange');
//Input 'pointsId'
const pointsId = document.getElementById('pointsId');

//Points
let points = 0;
verifierBtn.addEventListener('click', afficheTout);
resetBtn.addEventListener('click', reset);

//Functions ----------------------------------------------

/**
 * Function qui sert à remettre à 0 toutes les corrections et réponses.
 *
 */
function reset() {

    //premiereUtilite
    for (let i in premiereUtilite) {
        let id = premiereUtilite[i];
        id.style.accentColor = "initial";
        let idParent = id.parentNode;
        idParent.style.borderBottom = 'none';
    }

    //AvanceBateau
    for (let i in avanceBateau) {
        let id = avanceBateau[i];
        id.style.accentColor = "initial";
        let idParent = id.parentNode;
        idParent.style.borderBottom = 'none';
    }

    //nautismeResponse
    nautisme.value = '';
    nautisme.style.color = 'black';
    nautisme.style.borderBottom = 'solid 2px black';

    //uniteMesure
    uniteMesure.value = 0;
    let childlblRange = lblRange.children[2];
    childlblRange.style.color = 'initial';
    uniteMesure.style.background = 'darkblue';

    //millesNautiques
    millesNautique.selectedIndex = 0;
    millesNautique.style.background = 'white';
    millesNautique.style.color = 'black';
    millesNautique.parentNode.style.borderBottom = 'none';

    //sportAutres
    for (let i in sportAutres) {
        let id = sportAutres[i];
        id.style.accentColor = "blue";
        let idParent = id.parentNode;
        idParent.style.borderBottom = 'none';
    }

    //directionPlanche
    for (let i in directionPlanche) {
        let id = directionPlanche[i];
        id.style.accentColor = "blue";
        let idParent = id.parentNode;
        idParent.style.borderBottom = 'none';
    }

    //systemeFoil
    let optionFoil = systemeFoil.children[2];
    let options = [
        systemeFoil.children[0],
        systemeFoil.children[1],
        systemeFoil.children[2],
        systemeFoil.children[3],
        systemeFoil.children[4],
        systemeFoil.children[5]
    ];
    for (let i in options) {
        let option = options[i];
        option.style.background = 'white';
        option.style.color = 'black';
    }
    systemeFoil.selectedIndex = 'none';
    optionFoil.style.background = 'white';
    systemeFoil.style.border = 'solid 2px black';
    optionFoil.style.color = 'black';

    //motInterdit
    motInterdit.value = ''
    motInterdit.style.color = 'black';
    motInterdit.style.borderBottom = 'black solid 2px';
    motInterdit.style.backgroundColor = 'white';

}


/**
* Functon principal qui sert a appeler toutes les functions nécéssaires pour le functionnement du site.
*

*/
function afficheTout() {
    afficheCorrectpremiereUtilite();
    afficheCorrectAvanceBateau();
    afficheCorrectNautisme();
    afficheCorrectuniteMesure();
    afficheCorrectMillesNautique();
    afficheCorrectSportAutres();
    afficheCorrectdirectionPlanche();
    afficheCorrectsystemeFoil();
    afficheCorrectMotInterdit();
    affichePoints();
}

/**
 * Affiche les points obtenue dans le quiz.
 *
 */
function affichePoints() {

    if (points == 9) {
        alert(`Bravo ${nom.value}! T\'as eu ${points} points, tous les points! Trop fort!.`)

    } else if (points > 5) {
        alert(`Bravo ${nom.value}! T\'as eu ${points} points, plus que la moyenne.`)
    } else {
        alert(`Faut lire mieux ${nom.value}! T\'as eu ${points} points, moins que la moyenne.`)

    }
}

// affiche corrections ------------------

/**
 * Affiche les reéponses corerctes de 'premiereUtilite'
 */
function afficheCorrectpremiereUtilite() {
    let resp = verifiePremiereUtilite();

    if (resp) {
        for (let i in premiereUtilite) {
            let id = premiereUtilite[i];

            if (id.id == 'cargaison' || id.id == 'moyenTransport') {
                id.style.accentColor = "lightGreen";
                let idParent = id.parentNode;
                idParent.style.borderBottom = 'solid 2px lightgreen';
            }
        }
    } else {
        for (let i in premiereUtilite) {
            let id = premiereUtilite[i];

            if (id.id == 'cargaison' || id.id == 'moyenTransport') {
                id.style.accentColor = "lightGreen";
                let idParent = id.parentNode;
                idParent.style.borderBottom = 'solid 2px lightgreen';

            } else if (id.id != 'cargaison' || id.id != 'moyenTransport') {
                id.style.accentColor = "red";
                let idParent = id.parentNode;
                idParent.style.borderBottom = 'solid 2px red';

            }
        }
    }

}


/**
 * Affiche les reéponses corerctes de 'AvanceBateau'
 */
function afficheCorrectAvanceBateau() {
    let resp = verifieAvanceBateau();

    if (resp) {
        for (let i in avanceBateau) {
            let id = avanceBateau[i];

            if (id.id == 'depressionVoile') {
                id.style.accentColor = "lightGreen";

                let idParent = id.parentNode;
                idParent.style.borderBottom = 'solid 2px lightgreen';
            }
        }
    } else {
        for (let i in avanceBateau) {
            let id = avanceBateau[i];

            if (id.id == 'depressionVoile') {
                id.style.accentColor = "lightGreen";

                let idParent = id.parentNode;
                idParent.style.borderBottom = 'solid 2px lightgreen';

            } else if (id.id != 'depressionVoile') {
                id.style.accentColor = "red";
                let idParent = id.parentNode;
                idParent.style.borderBottom = 'solid 2px red';

            }
        }
    }
}


/**
 * Affiche les reéponses corerctes de 'nautismeResponse'
 */
function afficheCorrectNautisme() {
    let resp = verifieNautisme();

    if (resp) {
        nautisme.style.color = 'green';
        nautisme.style.borderBottom = 'solid 2px lightgreen';
    } else {
        nautisme.value += ' -- Réponse correct : nautisme';
        nautisme.style.color = 'red';
        nautisme.style.borderBottom = 'solid 2px red';
    }


}


/**
 * Affiche les reéponses corerctes de 'uniteMesure'
 */
function afficheCorrectuniteMesure() {
    let resp = verifieUniteMesure();

    uniteMesure.value = 2;
    let childlblRange = lblRange.children[2];

    // for()
    // if(childRangeLa)
    childlblRange.style.color = 'lightgreen';
    uniteMesure.style.background = 'lightgreen'; // - color of range
    // uniteMesure.style.borderBottom = 'solid 2px lightgreen';
}


/**
 * Affiche les reéponses corerctes de 'millesNautique'
 */
function afficheCorrectMillesNautique() {
    let resp = verifieMillesNautique();

    millesNautique.selectedIndex = 2;
    millesNautique.style.background = 'green';
    millesNautique.style.color = 'white';
    millesNautique.parentNode.style.borderBottom = 'solid 2px green';

}


/**
 * Affiche les reéponses corerctes de 'sportAutres'
 */
function afficheCorrectSportAutres() {
    let resp = verifieSportAutres();

    if (resp) {
        for (let i in sportAutres) {
            let id = sportAutres[i];

            if (id.id == 'kitesurf' || id.id == 'plancheVoile') {
                id.style.accentColor = "lightGreen";

                let idParent = id.parentNode;
                idParent.style.borderBottom = 'solid 2px lightgreen';
            }
        }
    } else {
        for (let i in sportAutres) {
            let id = sportAutres[i];

            if (id.id == 'kitesurf' || id.id == 'plancheVoile') {
                id.style.accentColor = "lightGreen";

                let idParent = id.parentNode;
                idParent.style.borderBottom = 'solid 2px lightgreen';

            } else if (id.id != 'kitesurf' || id.id == 'plancheVoile') {
                id.style.accentColor = "red";
                let idParent = id.parentNode;
                idParent.style.borderBottom = 'solid 2px red';

            }
        }
    }
}


/**
 * Affiche les reéponses corerctes de 'directionPlanche'
 */
function afficheCorrectdirectionPlanche() {
    let resp = verifieDirectionPlanche();

    if (resp) {
        for (let i in directionPlanche) {
            let id = directionPlanche[i];

            if (id.id == 'mat') {
                id.style.accentColor = "lightGreen";

                let idParent = id.parentNode;
                idParent.style.borderBottom = 'solid 2px lightgreen';
            }
        }
    } else {
        for (let i in directionPlanche) {
            let id = directionPlanche[i];

            if (id.id == 'mat') {
                id.style.accentColor = "lightGreen";

                let idParent = id.parentNode;
                idParent.style.borderBottom = 'solid 2px lightgreen';

            } else if (id.id != 'mat') {
                id.style.accentColor = "red";
                let idParent = id.parentNode;
                idParent.style.borderBottom = 'solid 2px red';

            }
        }
    }
}


/**
 * Affiche les reéponses corerctes de 'systemeFoil'
 */
function afficheCorrectsystemeFoil() {
    let resp = verifieSystemeFoil();
    let optionFoil = systemeFoil.children[2];

    if (resp) {
        optionFoil.style.background = 'lightgreen';

    } else if (systemeFoil.selectedIndex > -1) {
        let optionChoisi = systemeFoil.children[systemeFoil.selectedIndex];
        optionChoisi.style.background = 'red';
        optionChoisi.style.color = 'white';
        optionFoil.style.background = 'lightgreen';
        systemeFoil.style.border = 'solid 2px red';

    } else {
        let options = [
            systemeFoil.children[0],
            systemeFoil.children[1],
            systemeFoil.children[2],
            systemeFoil.children[3],
            systemeFoil.children[4],
            systemeFoil.children[5]
        ];
        for (let i in options) {
            let option = options[i];
            option.style.background = 'red';
            option.style.color = 'white';
        }
        systemeFoil.selectedIndex = '2';
        optionFoil.style.background = 'lightgreen';
        systemeFoil.style.border = 'solid 2px red';
        optionFoil.style.color = 'black';
    }
}

/**
 * Affiche les reéponses corerctes de 'Bonus - MotInterdi'
 *
 */
function afficheCorrectMotInterdit() {
    let resp = verifieMotInterdit();

    if (resp) {
        motInterdit.style.color = 'white';
        motInterdit.style.background = 'green';
        motInterdit.style.borderBottom = 'green solid 2px';
    } else {
        motInterdit.value += ' - Reponse : corde'
        motInterdit.style.color = 'red';
        motInterdit.style.borderBottom = 'red solid 2px';

    }

}

//verifie responses -----------------------------------------------------------------------

/**
 * Vérifie si toutes les réponses de l'élément HTML premiereUtilite sont justes et ajoute un points en concéquence.
 *
 * @returns {true} si toutes les réponses mises dans premiereUtilite sont justes.
 * @returns {false} si toutes les réponses mises dans premiereUtilite sont fauses.
 */
function verifiePremiereUtilite() {

    //verifie 'premiereUtilite' responses
    let verifieCargaison = false;
    let verifieTransport = false;
    let verifieAutres = true;

    let premiereUtiliteResp = getPremiereUtiliteResponse();

    for (let i in premiereUtiliteResp) {
        let resp = premiereUtiliteResp[i];
        if (resp == 'cargaison') {
            verifieCargaison = true;
        } else if (resp == 'moyenTransport') {
            verifieTransport = true;
        } else {
            verifieAutres = false;
        }
    }

    if (verifieCargaison && verifieTransport && verifieAutres) {
        points += 1;
        return true;
    } else {
        return false;
    }
}

/**
 * Vérifie si la réponse de l'élément HTML avanceBateau est juste et ajoute un points en concéquence.
 *
 * @returns {true} si la réponse mise dans avanceBateau est juste.
 * @returns {false} si la réponse mise dans avanceBateau est fause.
 */
function verifieAvanceBateau() {
    //verifie 'avanceBateau' responses
    let avanceBateauResp = getAvanceBateauResponse();

    if (avanceBateauResp == 'depressionVoile') {
        points += 1;
        return true;
    } else {
        return false;
    }

}

/**
 * Vérifie si la réponse de l'élément HTML nautisme est juste et ajoute un points en concéquence.
 *
 * @returns {true} si la réponse mise dans nautisme est juste.
 * @returns {false} si la réponse mise dans nautisme est fause.
 */
function verifieNautisme() {
    //verifie 'nautismeResp' responses
    let nautismeResp = getNautismeResponse();
    if (nautismeResp.toLowerCase().trim() == "nautisme") {
        points += 1;
        return true;
    } else {
        return false;
    }
}

/**
 * Vérifie si la réponse de l'élément HTML uniteMesure est juste et ajoute un points en concéquence.
 *
 * @returns {true} si la réponse mise dans uniteMesure est juste.
 * @returns {false} si la réponse mise dans uniteMesure est fause.
 */
function verifieUniteMesure() {
    let uniteMesureResp = getUniteMesureResponse();
    if (uniteMesureResp == "noeuds") {
        points += 1;
        return true;
    } else {
        return false;
    }
}

/**
 * Vérifie si la réponse de l'élément HTML  millesNautique est juste et ajoute un points en concéquence.
 *
 * @returns {true} si la réponse mise dans millesNautique est juste.
 * @returns {false} si la réponse mise dans millesNautique est fause.
 */
function verifieMillesNautique() {
    let millesNautiqueResp = getMillesNautiqueResponse();
    if (millesNautiqueResp == "millesNautiques") {
        points += 1;
        return true;
    } else {
        return false;
    }
}

/**
 * Vérifie si toutes les réponses de l'élément HTML sportAutres sont justes et ajoute des points en concéquence.
 *
 * @returns {true} si toutes les réponses mises dans sportAutres sont justes.
 * @returns {false} si toutes les réponses mises dans sportAutres sont fauses.
 */
function verifieSportAutres() {

    let verifieKitesurf = false;
    let verifiePlancheVoile = false;
    let verifieAutres = true;

    let sportAutresResp = getSportAutresResponse();

    for (let i in sportAutresResp) {
        let elementListe = sportAutresResp[i];
        if (elementListe == "kitesurf") {
            verifieKitesurf = true;
        } else if (elementListe == "plancheVoile") {
            verifiePlancheVoile = true;
        } else {
            verifieAutres = false;
        }
    }

    if (verifieKitesurf && verifiePlancheVoile && verifieAutres) {
        points += 1;
        return true;
    } else {
        return false;
    }
}

/**
 * Vérifie si la réponse de l'élément HTML  directionPlanche est juste et ajoute un points en concéquence.
 *
 * @returns {true} si la réponse mise dans directionPlanche est juste.
 * @returns {false} si la réponse mise dans directionPlanche est fause.
 */
function verifieDirectionPlanche() {
    let directionPlancheResp = getDirectionPlanche();
    if (directionPlancheResp == "mat") {
        points += 1;
        return true;
    } else {
        return false;
    }
}

/**
 * Vérifie si la réponse de l'élément HTML  sytemeFoil est juste et ajoute un points en concéquence.
 *
 * @returns {true} si la réponse mise dans sytemeFoil est juste.
 * @returns {false} si la réponse mise dans sytemeFoil est fause.
 */
function verifieSystemeFoil() {
    let systemeFoilResp = getSytemeFoilResponse();
    if (systemeFoilResp == 'foil') {
        points += 1;
        return true;
    } else {
        return false;
    }
}

/**
 * Vérifie si la réponse de l'élément HTML  motinterdit est juste et ajoute un points en concéquence.
 *
 * @returns {true} si la réponse mise dans motInterdit est juste.
 * @returns {false} si la réponse mise dans motInterdit est fause.
 */
function verifieMotInterdit() {
    let motInterditResp = getMotInterditResponse();
    if (motInterditResp == 'corde') {
        points += 1;
        return true;
    } else {
        return false;
    }
}

//Get responses --------------------------------------------------------------------------

/**
 * Recupère et retourne la réponse de 'motInterdit'
 *
 * @returns {motInterdit.value} Retourne le réponse mise dans motInterdit.
 */
function getMotInterditResponse() {
    return motInterdit.value;
}

/**
 * Recupère et retourne la réponse de 'systemeFoil'
 *
 * @returns {systemeFoil.value} Retourne le réponse mise dans la systemeFoil.
 */
function getSytemeFoilResponse() {
    return systemeFoil.value;
}


/**
 * Recupère et retourne la réponse de 'directionPlanche'
 *
 * @returns {id.value} Retourne le réponse du checkbox.
 */
function getDirectionPlanche() {
    for (let i in directionPlanche) {
        let id = directionPlanche[i];
        if (id.checked) {
            return id.value;
        }
    }
}

/**
 * Recupère et retourne les réponses de 'sportAutres'
 *
 * @returns {retourListe} Retourne une liste des checkboxes qui sont checké.
 */
function getSportAutresResponse() {
    let retourListe = [];

    for (let i in sportAutres) {
        let id = sportAutres[i];

        if (id.checked) {
            retourListe.push(id.value);
        }
    }
    return retourListe;
}

//Get and return millesNautique response
/**
 * Recupère et retourne la réponse de 'millesNautique'
 *
 * @param {param}
 * @returns {millesNautique.value} Retourne le réponse d millesNautique.value.
 */
function getMillesNautiqueResponse() {
    return millesNautique.value;
}


/**
 * Recupère et retourne la réponse de 'uniteMesure'
 *
 * @returns {'kh/h'} Retourne le string 'kh/h' si l'utilisateur choisi 0 dans le range.
 * @returns {'milles'} Retourne le string 'milles' si l'utilisateur choisi 1 dans le range.
 * @returns {'noeuds'} Retourne le string 'noeuds' si l'utilisateur choisi 2 dans le range.
 * @returns {'milles nautiques'} Retourne le string 'milles nautiques' si l'utilisateur choisi 3 dans le range.
 */
function getUniteMesureResponse() {
    let uniteMesureRange = uniteMesure.value;

    if (uniteMesureRange == 0) {
        return 'km/h';

    } else if (uniteMesureRange == 1) {
        return 'milles';

    } else if (uniteMesureRange == 2) {
        return 'noeuds';

    } else if (uniteMesureRange == 3) {
        return 'milles nautiques';

    }
}

/**
 * Recupère et retourne la réponse de 'nautismeResponse'
 *
 * @returns {nautisme.value} Retourne le réponse stokée dans l'element 'nautisme'.
 */
function getNautismeResponse() {
    return nautisme.value;
}

/**
 * Recupère et retourne la réponse des radioButtons appellés : 'avanceBateau'
 *
 * @returns {id.value} Retourne la valeur de l'element stocké dans 'id'.
 */
function getAvanceBateauResponse() {

    for (let i in avanceBateau) {
        let id = avanceBateau[i];
        if (id.checked) {
            return id.value;
        }
    }
}

/**
 * Recupère et retourne la réponse des checkboxes appellés : 'premiereUtilite'
 *
 * @returns {premiereUtiliteResp} Retourne le réponse mise dans la première question.
 */
function getPremiereUtiliteResponse() {
    let premiereUtiliteResp = [];
    for (let i in premiereUtilite) {
        let id = premiereUtilite[i];
        if (id.checked) {
            premiereUtiliteResp.push(id.value);
        }
    }
    return premiereUtiliteResp;
}