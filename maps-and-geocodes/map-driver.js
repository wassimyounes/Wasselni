//  to show location and trip information
function showInfo() {
    setTimeout(() => {
        const locator = document.getElementById("trip-info");
        locator.style.visibility = "visible";
    }, 200)
}
const seeOnMapBtn = document.querySelectorAll(".seeonmap-btn")
seeOnMapBtn.forEach((el) => {
    el.addEventListener("click", () => {
        const fromString = el.parentElement.childNodes[0].childNodes[3].innerHTML;
        const toString = el.parentElement.childNodes[0].childNodes[5].innerHTML;
        const from = fromString.split(",");
        const to = toString.split(",");
        const fromLat = parseFloat(from[0]);
        const fromLng = parseFloat(from[1]);
        const toLat = parseFloat(to[0]);
        const toLng = parseFloat(to[1]);
        console.log(fromLat);
        console.log(fromLng);
        console.log(toLat);
        console.log(toLng);
 
        
        showInfo();
        callMap(fromLat, fromLng, toLat, toLng);
    })

})



// to hide location and trip information
const hideWindow = function () {
    const locator = document.getElementById("trip-info");
    locator.style.visibility = "hidden";
    locator.style.transition = "all .2s ease"
};
const downArrow = document.getElementById("down-arrow");
downArrow.addEventListener("click", () => {
    hideWindow();
});





// Set up the map
var map = L.map('map').setView([33.8547, 35.8623], 14)

// Add OpenStreetMap tiles

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
var routingContol;
function callMap(fromLat, fromLng, toLat, toLng) {

    if(routingContol) {
        map.removeControl(routingContol)
    }
// Define your start and end points
    var startPoint = L.latLng(fromLat, fromLng);
    var endPoint = L.latLng(toLat, toLng);


// Customize the icon options for start and end markers
var startIcon = L.icon({
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
    iconSize: [12, 21], // Adjust the size as needed
    iconAnchor: [1, 20],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
});

var endIcon = L.icon({
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
    iconSize: [12, 21], // Adjust the size as needed
    iconAnchor: [10, 20],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
});



// Create a routing control with customized icons
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
}).addTo(map);
}


