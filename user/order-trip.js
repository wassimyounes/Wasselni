const orderBtn = document.getElementById("order-btn");


orderBtn.addEventListener("click", () => {
    const startLocation = localStorage.getItem("fromCoordinates");
    const endLocation = localStorage.getItem("toCoordinates");
    const from = JSON.parse(startLocation);
    const to = JSON.parse(endLocation);
    const fromLat = from.latitude;
    const fromLng = from.longitude;
    const toLat = to.latitude;
    const toLng = to.longitude; 
    const coordinates = {
        fromLat,
        fromLng,
        toLat,
        toLng
    }



    fetch("../services/order-trip.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify(coordinates)
    })
    .then(res => res.json())
    .then(data => {
        console.log(data)
    }) 
    .catch(error => console.error("error", error));
    })
