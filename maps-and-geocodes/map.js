


    // Set up the map
var map = L.map('map').setView([33.5421, 35.5878], 18)

// Add OpenStreetMap tiles
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
var routingContol;
function callMap() {
    if(routingContol) {
        map.removeControl(routingContol)
    }
// Define your start and end points
const coordFrom = JSON.parse(localStorage.getItem("fromCoordinates"))
const coordTo = JSON.parse(localStorage.getItem("toCoordinates"))


var startPoint = L.latLng(coordFrom.latitude, coordFrom.longitude);
var endPoint = L.latLng(coordTo.latitude, coordTo.longitude);

// Customize the icon options for start and end markers
var startIcon = L.icon({
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
    iconSize: [18, 27],
    iconAnchor: [10, 25],
    popupAnchor: [1,-34],
    shadowSize: [41, 41]
});

var endIcon = L.icon({
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
    iconSize: [18, 27], 
    iconAnchor: [10, 28],
    popupAnchor: [1,-34],
    shadowSize: [41, 41]
});



routingContol = L.Routing.control({
    
    waypoints: [
        L.latLng(startPoint),
        L.latLng(endPoint)
    ],
    routeWhileDragging: true,
    createMarker: function (i, waypoint, n) {
        // Use the customized icons for start and end markers
        if (i === 0) {
            return L.marker(waypoint.latLng, { icon: startIcon });
        } else if (i === n - 1) {
            return L.marker(waypoint.latLng, { icon: endIcon });
        } else {
            return L.marker(waypoint.latLng);
        }

    },
    routeDragTimeout: 1
}).addTo(map);
}
document.getElementById("lets-go").addEventListener("click", () => {
    setTimeout(() => {
        callMap();
    }, 1000)
})
