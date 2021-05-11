'use strict';

let fullItem = document.getElementById("fullItem")
fullItem.style.backgroundImage = 'url(/images/items/id-card.png)';
fullItem.style.backgroundSize = "contain";
fullItem.style.backgroundRepeat = "no-repeat";
fullItem.style.backgroundPosition = "center";


let smallPng = document.querySelectorAll('.itemSmallPng');

smallPng.forEach((element) => {
    element.addEventListener('click', () => {
        console.log('storbild');
        let clickedItem = element.style.backgroundImage;
        let fullItemDiv = document.getElementById("fullItem");
        //let fullItem = fullItemDiv.style.backgroundImage;
        fullItemDiv.style.backgroundSize = "contain";
        fullItemDiv.style.backgroundRepeat = "no-repeat";
        fullItemDiv.style.backgroundPosition = "center";
        fullItemDiv.style.backgroundImage = clickedItem;
        //this.style.backgroundImage = coverImg; 
    })
})