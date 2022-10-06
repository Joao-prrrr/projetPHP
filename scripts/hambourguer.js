// Project : Voila! - Website
// Details : JavaScript - Menu Hambouguer
// Auth tabindex="22"or : Joao Araribá
// Date   : 25.04.2022 v1

//Variable qui indique si le menu a été cliqué ou pas.
var checked = false;

/**
 * Function qui affiche le menu 'nav' et fait l'animation du menu hambourguer.
 */
hamburguer.onclick = function() {
    if (checked == false) {
        checked = true;

        // Tourne le burguer
        barresTop.style.position = 'fixed'
        barresBottom.style.position = 'fixed'
        barresMiddle.style.display = 'none';
        barresTop.style.margin = '-2px';
        barresBottom.style.margin = '-2px';
        barresTop.style.transform = 'rotate(135deg)';
        barresBottom.style.transform = 'rotate(-135deg)';
        barresBottom.style.borderColor = 'white';
        barresTop.style.borderColor = 'white';

        // Affiche la nav
        menu.style.display = 'flex'
        menu.style.right = '0';
    } else if (checked == true) {
        checked = false;

        // Tourne le burguer
        barresTop.style.position = 'relative'
        barresBottom.style.position = 'relative'
        barresMiddle.style.display = 'block';
        barresTop.style.margin = '5px';
        barresBottom.style.margin = '5px';
        barresTop.style.transform = 'rotate(0deg)';
        barresBottom.style.transform = 'rotate(0deg)';
        barresBottom.style.borderColor = 'gray';
        barresTop.style.borderColor = 'gray';

        // Desafficher la nav
        menu.style.display = 'none'
    }

};