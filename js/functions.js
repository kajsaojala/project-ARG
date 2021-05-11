'use strict';

let STATE = {
    userID,
    userLevel,
    gps: () => {
        console.log('test');
        gpsID = navigator.geolocation.watchPosition(GPS.smoothPosition.bind(GPS), error, options);
    },
    currentPortal: 0, //i en funktion när portal på kartan markeras ska denna uppdateras med vilken portal spelaren är påväg till
    clickedOpenPortal: false,
    clickedPortal: false,
    inventory: [],
    openPortals: []
}


console.log(STATE);



switch(STATE.userLevel){
    case 1:
        //console.log('bara id:et som visas');
        break;
    case 2: 
        fillProgressBar(1);
        break;
    case 3:
        fillProgressBar(2);
        break;
    case 4:
        fillProgressBar(3);
        break;
    case 5:
        fillProgressBar(4);
        break;
}
    

function fillProgressBar(number){
    //document.querySelector(`.quarter${number}`).classList.add('filledProgress');
    let procent = document.getElementById('progress');

    let quarter = document.querySelectorAll('.quarter');
    quarter.forEach( (el) => {
        let id = el.id;
        let idNum = id.substr(7);
        if (idNum <= number) {
            el.style.backgroundColor = '#cb367a';
        }
    })

    switch(number){
        case 1: 
            procent.innerHTML = '25%';
            break;
        case 2:
            procent.innerHTML = '50%';
            break;
        case 3: 
            procent.innerHTML = '75%';
            break;
        case 4:
            procent.innerHTML = '100%';
            break;      
    }
}