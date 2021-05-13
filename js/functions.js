'use strict';

let STATE = {
    userID,
    userLevel: '',
    gps: () => {
        console.log('test');
        gpsID = navigator.geolocation.watchPosition(GPS.smoothPosition.bind(GPS), error, options);
    },
    currentPortal: '', //i en funktion när portal på kartan markeras ska denna uppdateras med vilken portal spelaren är påväg till
    clickedOpenPortal: false,
    clickedPortal: false,
    inventory: [],
    openPortals: []
}

/*window.onload = function (){
    console.log('test');
}

window.onresize(alert(window.onload))*/


//window.onresize(alert(window.onload))
/*function getData(){
    let request = new Request(`/admin/api.php?userID=${userID}`);
    fetch(request)
    .then(r => r.json())
    .then(data => {
        console.log(data.data);
        STATE.userLevel = data.data.level;
        console.log(STATE);
    });
}*/
/*
getData()
console.log(STATE);

document.getElementById('circle').addEventListener('click', () => {
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
        //Laddar om sidan så att innehållet i profilen laddas om direkt och påsåvis uppdateras!
        window.location.reload();
    })
})*/