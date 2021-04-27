'use strict';

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