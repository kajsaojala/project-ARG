
/* 

    navigation fungerar uselt på en desktop.
    Så vill ni testa detta behöver ni lägga upp det på en server och accessa den med en mobil.
    Rör på mobilen när ni testar.
    Om ni testar inomhus kommer det att ge konstiga resultat. GPS är inte gjort för inomhusbruk.


*/

let gpsID

const GPS = {


    options: {
        // Jag har inte riktigt testat smooth-funkionen inne i stan bland byggnader.
        // Värden nedan fungar bra om man är i en park eller så. Ni kanske vill trixa med dem
        // om er app ska användas inne i stan. Eller så kanske det inte alls behövs.

        timeThreshold: 10000,    // Locations older than 15000 miliseconds (6 secs) don't count.
        maxDistance: 0.0001,    // about 10 meters (in gps coordinates)
        minLocations: 3,        // We need at least 3 "good" locations.
                                //      (A good location is a location that is close to the others.)
    },

    // Internal utilities
    _arrayLocations: [],
    _average: function (array){
        return {
            latitude: array.map(l => l.latitude).reduce( (sum, lat) => sum + lat ) / array.length,
            longitude: array.map(l => l.longitude).reduce( (sum, long) => sum + long ) / array.length,
        };        
    },

    // Callable from outside
    reset: function(){ this._arrayLocations = []; },
    useLocation: exampleFunction,
    smoothPosition: function(navigationData){
        
        /*

        smoothPosition calls the function pointed to in GPS.useLocation.
        The function GPS.useLocation is called with one argument, which is:

            -   An object that contains the weighed average of the latest positions {latitude, longitude}
                Later positions have more weight, and positions that are far off are ignored.

            -   null if all positions are far from each other.
                This will typically happen during the first few seconds.
            
        */

        // Read locations and timestamp them                
        let {latitude, longitude} = navigationData.coords;
        let timestamp = Date.now();
    

        // Add new location at start of array
        this._arrayLocations.unshift({latitude, longitude, timestamp});

        // Remove too old locations
        let timeThreshold = this.options.timeThreshold;
        let newLocations = this._arrayLocations.filter( location => {
            //console.log(timestamp, location.timestamp, timeThreshold);
            return timestamp - location.timestamp < timeThreshold
        } );


        // Average {latitude, longitude} of the "new" positions
        let average = this._average(newLocations);


        // Filter out the positions that are too far from the average
        let maxD = this.options.maxDistance;
        let filtered = newLocations.filter(location => {
            return  Math.abs(location.latitude - average.latitude) < maxD &&
                    Math.abs(location.longitude - average.longitude) < maxD
        });


        // Return   average if there are enough good positions.
        //          null if not
        average = filtered.length > this.options.minLocations ? this._average(filtered) : null;



        this.useLocation(average);

    },


};









// Nedan visar jag hur man kan använda GPS-objektet.


// Example function. Check line 31 above
let testCount = 0;
let testError = 0;
function exampleFunction(data) {
    document.getElementById('portalPopup').style.display = 'flex';
    document.getElementById('portalPopupInfo').innerHTML = 'Looking for your location...';
    
    let inner;
    if (data === null) {
        inner = `No smooth position yet`;
    } else {
        let {latitude, longitude} = data;
        inner = `SMOOTH POS: ${latitude}, ${longitude}`;

        portals.forEach(portal => {
            if (Math.abs(data.latitude - portal.location.latitude) < 0.0003 && Math.abs(data.longitude - portal.location.longitude) < 0.0003) {
                
                if (STATE.clickedPortal == portal.id) {
                    navigator.geolocation.clearWatch(gpsID);
                    document.getElementById('portalPopupInfo').innerHTML = 'You are on the right location for this portal' + (portal.name) + `lat: ${portal.location.latitude} & lang: ${portal.location.longitude}` + '.' + 'Your location is' + `lat: ${data.latitude} & lang: ${data.longitude}`;
                    setTimeout(() => {
                        window.location.search = `?openPortal=${portal.id}`;
                    }, 3000);
                } else if (STATE.clickedOpenPortal && STATE.userLevel >= portal.id) {
                    navigator.geolocation.clearWatch(gpsID);
                    document.getElementById('portalPopupInfo').innerHTML = 'You are on the right location' + (portal.name) + `lat: ${portal.location.latitude} & lang: ${portal.location.longitude}` + '.' + 'Your location is' + `lat: ${data.latitude} & lang: ${data.longitude}`;
                    setTimeout(() => {
                        window.location.search = `?openPortal=${portal.id}`;
                    }, 5000);
                } else {
                    navigator.geolocation.clearWatch(gpsID);
                    document.getElementById('portalPopupInfo').innerHTML = 'You are not on the right location for this portal';
                }
    
                //console.log('test');
    
                /*else {
                    navigator.geolocation.clearWatch(gpsID);
                    document.getElementById('portalPopupInfo').innerHTML = 'You are not the right location for this portal';
                }*/
            }
        })
    }

    console.log(inner);
    //console.log(STATE);
    //document.getElementById("geotest").innerHTML += `<div>${inner} - (${++testCount})</div>`;

    //document.getElementById('portalPopupInfo').innerHTML = inner;
    
}




// SUGGESTIONS
function error(err) {
    console.warn(`ERROR(${err.code}): ${err.message}`);
    //document.getElementById("geotest").innerHTML += `<div>ERROR(${err.code}): ${err.message} (${++testError}: ${testCount})</div>`;
}
let options = {
    enableHighAccuracy: true,
    timeout: 5000,
    maximumAge: 0 // don't use old location data
};


// This is how you use GPS.smoothPosition:
//const gpsID = navigator.geolocation.watchPosition(GPS.smoothPosition.bind(GPS), error, options);
//console.log(gpsID);

// Shut down navigation after 20 seconds (inte testat!)
//setTimeout( () => { navigator.geolocation.clearWatch(gpsID); }, 20000); 