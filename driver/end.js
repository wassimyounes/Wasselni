const endBtn = document.getElementById("end");




function endRide() {
    const rideId = document.getElementById("ride-id").innerHTML;
    fetch("../services/end-ride.php", {
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


endBtn.addEventListener("click", () => {
    endRide();
    window.location.href = "driver-portal.php";
})