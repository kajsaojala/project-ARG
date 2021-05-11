'use strict';

class portalBase {
    constructor(data){
        let {id, year, location, code, unlocked, portalImg, item, message} = data;
        this.id = id;
        this.year = year;
        this.location = location;
        this.code = code;
        this.unlocked = unlocked;
        this.portalImg = portalImg;
        this.item = item;
        this.message = message;
    }
}

class openPortalBox extends portalBase{
    constructor(data){
        super(data);
    }

    createBox(){
        /*let html = document.createElement("a");
        html.setAttribute('href', 'portal-open.php');*/

        let html = document.createElement("div");
        html.classList.add("portalBox", `portalBox${this.id}`);

        let year = document.createElement("p");
        year.innerHTML = `${this.year.from} - ${this.year.to}`;
        year.classList.add("portalBoxYear");

        html.append(year);

        html.addEventListener('click', () => {
            STATE.clickedPortal = this.id;
            console.log(STATE);
            document.getElementById('portalPopup').style.display = 'flex';
            STATE.gps();
            //STATE.clickedPortal = false;
            //console.log(STATE.gps());
            /*setTimeout(() => {
                console.log('ta bort geo');
                if (document.getElementById('portalPopupInfo').innerHTML == 'You are not on this level yet') {
                    navigator.geolocation.clearWatch(gpsID);
                }
            }, 20000);*/
        })

        return html;
    }
}