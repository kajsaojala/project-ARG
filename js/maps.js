function initMap(){
    //map options
    let options = {
        zoom: 13,
        center: {
            lat:55.6052931,
            lng: 13.0001566
        }
    }

    //new map
    const map = new google.maps.Map(document.getElementById('map'), options);

    //add marker
    let marker = new google.maps.Marker({
        position: {lat: 55.5920196, lng: 13.01678179},
        map: map
    });
}