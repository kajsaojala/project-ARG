'use strict';

//Event för Login/Register popup, DISPLAY/HIDE
document.getElementById('loginBtn').addEventListener('click', function (){
    document.getElementById('popupLogin').style.display = 'block';
})

document.getElementById('registerBtn').addEventListener('click', function (){
    document.getElementById('popupRegister').style.display = 'block';
})

document.getElementById('closeLogin').addEventListener('click', function (){
    document.getElementById('popupLogin').style.display = 'none';
})

document.getElementById('closeRegister').addEventListener('click', function (){
    document.getElementById('popupRegister').style.display = 'none';
})


//let specifiedElement = document.getElementById('popupLogin');

//I'm using "click" but it works with any event
/*document.addEventListener('click', function(event) {

    if (specifiedElement.style.display == 'block') {
        var isClickInside = specifiedElement.contains(event.target);

        if (!isClickInside) {
            console.log('den är utanför');
            //specifiedElement.style.display = 'none';
        //the click was outside the specifiedElement, do something
        }
    }
});*/
