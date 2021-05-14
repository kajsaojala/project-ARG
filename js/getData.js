'use strict';
window.onload = function(){
    let request = new Request(`/admin/api.php?userID=${userID}`);
    fetch(request)
    .then(r => r.json())
    .then(data => {
        console.log(data.data);
        //STATE.userLevel = data.data.level;
        //console.log(STATE);
    });
}