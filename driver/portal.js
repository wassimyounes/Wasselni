const acceptBtns = document.querySelectorAll("#accept");






function acceptRide(rideId) {

    // const rideId = document.getElementById("ride-id").innerHTML;
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

acceptBtns.forEach((acceptedBtn) => {
    acceptedBtn.addEventListener("click", () => {
    const rideId = acceptedBtn.parentElement.childNodes[0].childNodes[7].innerHTML;
        acceptRide(rideId);
        window.location.href = "driver-portal-accepted.php";
    })
})    









