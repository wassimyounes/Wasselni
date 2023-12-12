// Map_API_Key:   AIzaSyDv0uA6ijVASrxeATuyipiMZwmT7Lasq4g


const myLocation =navigator.geolocation;

myLocation.getCurrentPosition(showLocation);
function showLocation(position) {
    const myLat = position.coords.latitude;
    const myLong = position.coords.longitude;

    const coords = new google.maps.LatLng(myLat, myLong);

    const mapOptions = {
        zoom: 15,
        center: coords,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }

    const map = new google.maps.Map(document.getElementById('map'), mapOptions);

    const marker = new google.maps.Marker({
        map: map,
        position: coords,
        title: 'you are here',
        icon: {
            url: 'images/me1.png',
        }

    });



}

// function failure(){

// }


// const map = new google.maps.Map(document.getElementById('map'), {
//     zoom: 12
// });


// if (navigator.geolocation){
//     navigator.geolocation.getCurrentPosition((position) => {
//         const userLocation = {
//             lat: position.coords.latitude,
//             lng: position.coords.longitude
//         };
        
//         const geocoder = new google.maps.Geocoder();
//         geocoder.geocode({'location' : userLocation }, (results, status) => {
//             if (status === 'ok') {
//                 if (results[0]) {
//                     map.setCenter(userLocation);
                    
//                     const userMarker = new google.maps.Marker ({
//                         position: userLocation,
//                         map: map,
//                         title: results[0].formatted_address
//                     });


//                 } else {
//                     console.log('No results found');
//                 }
//             } else {
//                 console.log('geocoder failed due to' + status);
//             }
//         })
//     })
// }
// document.getElementById('userLocation').innerHTML = 'hello'