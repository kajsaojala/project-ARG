'use strict';

//Kolla user level för att se vilka portaler som är öppnade
function loadOpenPortals(){
    switch(STATE.userLevel){
        case 1:
            //console.log('player is on level 1');
            //loadPortalBoxes(portals[0])
            updateOpenPortals(portals.slice(0, 1));
            break;
        case 2: 
            //console.log('player is on level 2');
            //loadPortalBoxes(portals.slice(0, 2));
            updateOpenPortals(portals.slice(0, 1));
            break;
        case 3:
            //console.log('player is on level 3');
            //loadPortalBoxes(portals.slice(0, 3));
            updateOpenPortals(portals.slice(0, 2));
            break;
        case 4:
            //console.log('player is on level 4');
            //loadPortalBoxes(portals.slice(0, 4));
            updateOpenPortals(portals.slice(0, 3));
            break;
        case 5:
            //console.log('player is on level 4');
            //loadPortalBoxes(portals.slice(0, 4));
            updateOpenPortals(portals.slice(0, 4));
            break;
    }

    loadPortalBoxes(STATE.openPortals);
}

function updateOpenPortals(portals){
    portals.forEach(portal => {
        STATE.openPortals.push(new openPortalBox(portal));
    })
}

function loadPortalBoxes(portalArray){
    //ladda upp boxarna genom att appenda i en div som kommer från classes
    const portalDiv = document.getElementById("openPortals");
    portalArray.forEach(element => {
        portalDiv.append(element.createBox());
    });
}

//När spelaren klickar på OPEN-knappen efter att ha slagit in koden
document.getElementById('openPortalBtn').addEventListener('click', () => {
    let inputValue = document.getElementById('inputCode').value;
    console.log(inputValue);
    //console.log(portals[STATE.currentPortal - 1].code);

    if (inputValue == portals[STATE.currentPortal - 1].code) { //kollar input-koden med portalkoden
        //om koden är rätt
        STATE.clickedOpenPortal = true;
        console.log(STATE);
        //document.getElementById('portalPopup').style.display = 'flex';
        STATE.gps();
        //document.getElementById('inputCode').innerHTML = '';
        //STATE.clickedOpenPortal = false;
    } else {
        document.getElementById('codePopup').style.display = 'flex';
    }

    document.getElementById('inputCode').value = '';
})

document.getElementById('infoButton').addEventListener('click', () => {
    document.getElementById('infoPopup').style.display = 'flex';
})


document.getElementById('closeInfoInfo').addEventListener('click', () => {
    document.getElementById('infoPopup').style.display = 'none';
})

document.getElementById('closePortalInfo').addEventListener('click', () => {
    document.getElementById('portalPopup').style.display = 'none';
    navigator.geolocation.clearWatch(gpsID);
    document.getElementById('portalPopupInfo').innerHTML = 'Looking for your location...';
})

document.getElementById('closeCodeInfo').addEventListener('click', () => {
    document.getElementById('codePopup').style.display = 'none';
})
function loadOpenPortalPage(){
    //Ska ta emot vilken portal som ska laddas upp + dess nycklar som tex 360-bild
    console.log('Ta bort html på sidan och ladda in nytt');
}