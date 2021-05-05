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
        let html = document.createElement("div");
        html.classList.add("portalBox", `portalBox${this.id}`);

        let year = document.createElement("p");
        year.classList.add("portalBoxYear");

        html.append(year);

        return html;
    }
}