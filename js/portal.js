'use strict';

window.onload = function(){
    switch(STATE.userLevel){
        case 0:
            console.log('player is on level 0');
            loadPortalBoxes(portals[0])
            break;
        case 1: 
            console.log('player is on level 1');
            loadPortalBoxes(portals.slice(0, 2));
            break;
        case 2:
            console.log('player is on level 2');
            loadPortalBoxes(portals.slice(0, 3));
            break;
        case 3:
            console.log('player is on level 3');
            loadPortalBoxes(portals.slice(0, 4));
            break;
        case 4:
            console.log('player is on level 4');
            loadPortalBoxes(portals);
            break; 
    }
}

function loadPortalBoxes(portalArray){
    //ladda upp boxarna genom att appenda i en div som kommer från classes
    console.log(portalArray);
}


//KLICK på collect-item knappen

const collectBox = document.getElementById('collectBox');

document.getElementById('portalGoBtn').addEventListener('click', function(){
    console.log('Här ska vi känna av om spelaren kan öppna 360-bilden, beroende på om spelaren är på rätt ställe');
})

document.getElementById('collectItemBtn').addEventListener('click', function(){
    collectBox.style.display = 'flex';
})

document.getElementById('collectBtn').addEventListener('click', function(){
    //Här ska det hända grejer, spara till ryggsäck, ändra level osv
    console.log('Här får vi ge feedback till spelaren att item lades till');
    collectBox.style.display = 'none';
})