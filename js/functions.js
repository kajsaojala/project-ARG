'use strict';

let STATE = {
    userID,
    userLevel: '',
    gps: () => {
        console.log('test');
        gpsID = navigator.geolocation.watchPosition(GPS.smoothPosition.bind(GPS), error, options);
    },
    currentPortal: '',
    portalOpen: '',
    clickedOpenPortal: false,
    clickedPortal: false,
    inventory: [],
    openPortals: []
}

window.onload = function(){
    let request = new Request(`/admin/api.php?userID=${userID}`);
    fetch(request)
    .then(r => r.json())
    .then(data => {
        STATE.userLevel = data.data.level;
        STATE.currentPortal = data.data.level;
        console.log(STATE);

        const pageURL = window.location.href;
        const lastURLSegment = pageURL.substr(pageURL.lastIndexOf('/') + 1);
        const path = lastURLSegment.substr(0, lastURLSegment.length -4)
        
        switch(path) {
            case 'home':
                loadProgress();
                updateInventoryState();
                loadMap(STATE.currentPortal);
                break;
            case 'inventory':
                updateInventoryState();
                break;  
            case 'portal':
                loadOpenPortals();
        }
    });
}

//KLICK på collect-item knappen
const collectBox = document.getElementById('collectBox');
const collectFeedbackBox = document.getElementById('collectFeedbackBox');

document.getElementById('collectItemBtn').addEventListener('click', function(){
    collectBox.style.display = 'flex';
})

document.getElementById('collectBtn').addEventListener('click', function(){
    //Här ska det hända grejer, spara till ryggsäck, ändra level osv
    console.log('Här får vi ge feedback till spelaren att item lades till');
    let inputCollect = document.getElementById('collectInput').value;

    if (inputCollect == portals[STATE.currentPortal - 1].item.code) {
     
        let request = new Request("/admin/api.php", {
            method: "PATCH",
            headers: { "Content-Type": "application/json; charset=UTF-8" },
            body: JSON.stringify({
                userID: STATE.userID,
                level: STATE.userLevel
            })
        })
        fetch(request)
        .then(response =>{
            return response.json();
        })
        .then(resource => {
            console.log(resource);

            collectFeedbackBox.style.display = 'flex';
            collectFeedbackBox.querySelector('#collectFeedback').innerHTML = `You have collected the ${portals[STATE.currentPortal - 1].item.name}`;
            collectFeedbackBox.querySelector('#okFeedback').addEventListener('click', () => {
                collectFeedbackBox.style.display = 'none';
                //Laddar om sidan så att innehållet i profilen laddas om direkt och påsåvis uppdateras!
                window.location.reload();
            })
        })

    } else {
        collectFeedbackBox.style.display = 'flex';
        collectFeedbackBox.querySelector('#collectFeedback').innerHTML = 'Code for item is incorrect';
        collectFeedbackBox.querySelector('#okFeedback').addEventListener('click', () => {
            collectFeedbackBox.style.display = 'none';
        })
    }
})

document.getElementById('closeCollect').addEventListener('click', () => {
    collectBox.style.display = 'none';
})


