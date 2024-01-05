


const startBtn = document.getElementById("start");




function startRide() {
    const rideId = document.getElementById("ride-id").innerHTML;
    fetch("../services/start-trip.php", {
        method: "POST",
        Headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ rideId: rideId })
    })
    .then(res => res.json())
    .then(data => {
        console.log(data);
    }) 
    .catch(error => console.error("Error;", error))
    }


startBtn.addEventListener("click", () => {
startRide();
window.location.href = "driver-portal-started.php";
})