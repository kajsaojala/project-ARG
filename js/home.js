'use strict';

function loadProgress(){
    switch(STATE.userLevel){
        case 1:
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

function loadMap(num){
    const mapDiv = document.getElementById('map-div');
    mapDiv.style.backgroundImage = `url(/images/maps/map-${num}.png)`;
    mapDiv.style.backgroundSize = "cover";
    mapDiv.style.backgroundRepeat = "no-repeat";
    mapDiv.style.backgroundPosition = "center";
}