'use strict';


//Eventet där vi registrerar en ny användare
document.getElementById('register').addEventListener('submit', function(event){

    event.preventDefault();

    //Sparar det som är inskrivet i input fälten i olika variabler
    let newEmail = document.getElementById('regEmail').value;
    let newPhone = document.getElementById('regPhone').value;
    let newPassword = document.getElementById('regPassword').value;
    console.log(newPassword)

    //Funktionen för att addera den nya användare till arrayen med metoden POST
    let request = new Request("../admin/api.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            email: newEmail,
            phone: newPhone,
            password: newPassword
        })
    })
    fetch(request)
    .then(response => {
        return response.json();
    })
    .then(json => {
        //Om vi får ett json.errors från api.php så har något gått snett och användaren kan ej registrera sig
        if (json.errors !== undefined) {
            console.log('nej')

        }  else if (json.data !== undefined) {
            // Om användaren fyllt i input fälten korrekt så skapas en ny användare med feedback om att det går att logga in
            document.getElementById('regEmail').value = "";
            document.getElementById('regPhone').value = "";
            document.getElementById('regPassword').value = "";
            document.getElementById('feedback').innerHTML = json.data;
        }
        console.log(json);
        
    })
})


//Event för Login/Register
document.getElementById('modalLoginBtn').addEventListener('click', function(){
    document.getElementById('modalJoinBtn').classList.remove('active');
    document.getElementById('modalLoginBtn').classList.add('active');

    document.getElementById('loginWrapper').style.cssText = 'display: block;'
    document.getElementById('registerWrapper').style.cssText = 'display: none;'
    
})
document.getElementById('modalJoinBtn').addEventListener('click', function(){
    document.getElementById('modalLoginBtn').classList.remove('active');
    document.getElementById('modalJoinBtn').classList.add('active');

    document.getElementById('loginWrapper').style.cssText = 'display: none;'
    document.getElementById('registerWrapper').style.cssText = 'display: block;'
    
    
})