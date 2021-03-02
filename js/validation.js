let form = byId("formReserver");
let champs = selecteur("input[required]");

if (form && champs) {

    let date_debut = byId('date_debut');
    let date_fin = byId('date_fin');

    let sansChiffre = selecteur('.noChiffre');

    // sansChiffre.forEach((sans) => {
    //     sans.addEventListener('keyup', function() {
    //         let str = parseInt(sans.value);
    //         if (!Number.isInteger(sans.value)) {
    //             console.log(str);
    //         }
    //     })
    // });


    date_debut.addEventListener('change', () => {
        //réactivation du champs date fin
        date_fin.disabled = false;
        date_fin.min = date_debut.value;

        date_fin.addEventListener('change', () => {
            let jours = nbJours(date_debut.value, date_fin.value);
             byId('prix').innerHTML = byId('prixChambre').value*jours+"€";
        });
    });

    for (let i = 0; i < champs.length; i++) {
        champs[i].addEventListener('focus', () => { resetChamp(champs[i]) });
        champs[i].addEventListener('blur', () => { valideChamp(champs[i]) });
    }

    form.addEventListener('submit', (event) => {
        event.preventDefault();
        let valide = true;
        champs.forEach((champ) => {
            if (!valideChamp(champ)) {
                console.log("min " + champ.value);
                valide = false;
            }
        });

        //   selecteur('input[submit]')[0].disabled = false;
        if (valide) {
            event.target.submit();
        }
    });
}

function valideChamp(champ) {
    if (champ.checkValidity()) {
        return true
    } else {
        //créer une classe 'classList.add' - remove - toggle - contains
        champ.classList.add("invalide");
        champ.previousElementSibling.insertAdjacentHTML('beforeend', `<span class="msg">${champ.validationMessage}</span>`)
        return false;
    }
}

function resetChamp(champ) {
    let msgLabel = champ.previousElementSibling;
    while (msgLabel.firstElementChild) {
        msgLabel.removeChild(msgLabel.firstElementChild);
    }
}

function selecteur(identifiant) {
    return document.querySelectorAll(identifiant);
}

function byId(id) {
    return document.getElementById(id);
}


function nbJours(d1, d2){
    let debut = new Date(d1);
    let fin = new Date(d2);
    return (fin-debut)/(24*60*60*1000)+1;

}
