const acceptBtn = document.getElementById("accept");






function acceptRide() {

    const rideId = document.getElementById("ride-id").innerHTML;
    fetch("../services/accept-ride.php", {
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

acceptBtn.addEventListener("click", () => {
    acceptRide();
    window.location.href = "driver-portal-accepted.php";
})








