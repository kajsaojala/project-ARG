'use strict';

const portalIndex = portalID - 1;

document.getElementById('portalYear').innerHTML = `${portals[portalIndex].year.from} - ${portals[portalIndex].year.to}`;


document.getElementById('portalGoBtn').addEventListener('click', function(){
    window.location.href = `http://localhost:1010/pages/panorama-${portalIndex + 1}.html`;
    console.log(window.location.href);
})