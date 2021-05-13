function initMap(){
  //map options
  let options = {
      zoom: 13,
      center: {
          lat:55.6052931,
          lng: 13.0001566
      },
      styles: [
          { elementType: "geometry", stylers: [{ color: "#242f3e" }] },
          { elementType: "labels.text.stroke", stylers: [{ color: "#242f3e" }] },
          { elementType: "labels.text.fill", stylers: [{ color: "#746855" }] },
          {
            featureType: "administrative.locality",
            elementType: "labels.text.fill",
            stylers: [{ color: "#d59563" }],
          },
          {
            featureType: "poi",
            elementType: "labels.text.fill",
            stylers: [{ color: "#d59563" }],
          },
          {
            featureType: "poi.park",
            elementType: "geometry",
            stylers: [{ color: "#263c3f" }],
          },
          {
            featureType: "poi.park",
            elementType: "labels.text.fill",
            stylers: [{ color: "#6b9a76" }],
          },
          {
            featureType: "road",
            elementType: "geometry",
            stylers: [{ color: "#38414e" }],
          },
          {
            featureType: "road",
            elementType: "geometry.stroke",
            stylers: [{ color: "#212a37" }],
          },
          {
            featureType: "road",
            elementType: "labels.text.fill",
            stylers: [{ color: "#9ca5b3" }],
          },
          {
            featureType: "road.highway",
            elementType: "geometry",
            stylers: [{ color: "#746855" }],
          },
          {
            featureType: "road.highway",
            elementType: "geometry.stroke",
            stylers: [{ color: "#1f2835" }],
          },
          {
            featureType: "road.highway",
            elementType: "labels.text.fill",
            stylers: [{ color: "#f3d19c" }],
          },
          {
            featureType: "transit",
            elementType: "geometry",
            stylers: [{ color: "#2f3948" }],
          },
          {
            featureType: "transit.station",
            elementType: "labels.text.fill",
            stylers: [{ color: "#d59563" }],
          },
          {
            featureType: "water",
            elementType: "geometry",
            stylers: [{ color: "#17263c" }],
          },
          {
            featureType: "water",
            elementType: "labels.text.fill",
            stylers: [{ color: "#515c6d" }],
          },
          {
            featureType: "water",
            elementType: "labels.text.stroke",
            stylers: [{ color: "#17263c" }],
          },
        ]
  }

  //new map
  const map = new google.maps.Map(document.getElementById('map'), options);

  function addMarker(coords, faded = false){
    let image = '/images/redMarker.png';

    if (faded) {
      image = '/images/marker.png';
    }

    let marker = new google.maps.Marker({
      position: coords,
      icon: image
    });

    marker.setMap(map);

    const infowindow = new google.maps.InfoWindow({
      content: '<h1 id="testText">Testing</h1>',
    });

    marker.addListener("click", () => {
      infowindow.open(map, marker);
    });

  }

  const coordsArr = [
    {lat: 55.607938, lng: 12.993812},
    {lat: 55.609578, lng: 12.997708},
    {lat: 55.605623, lng: 13.001312},
    {lat: 55.600685, lng: 12.993762}
  ];

  switch(STATE.userLevel){
    case 1:
      addMarker(coordsArr[0]);
      break;
    case 2:
      coordsArr.slice(0, 1).forEach((coords) => {
        addMarker(coords, true);
      });
      addMarker(coordsArr[1]);
      break;
    case 3:
      coordsArr.slice(0, 2).forEach((coords) => {
        addMarker(coords, true);
      });
      addMarker(coordsArr[2]);
      break;
    case 4:
      coordsArr.slice(0, 3).forEach((coords) => {
        addMarker(coords, true);
      });
      addMarker(coordsArr[3]);
      break;
  }
}