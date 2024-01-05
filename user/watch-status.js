function initWatch() {
  
        console.log("initilized watch")
    

            fetch("../services/status-update-user.php")
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    document.getElementById("status").innerHTML = data;
                    console.log(data)
                })
                .catch(error => {
                    console.error('Error fetching status:', error);
                });
        
    setInterval(WatchAndUpdateStatus, 5000);
}


function WatchAndUpdateStatus() {
    console.log("watching")
    const rideStatus = document.getElementById("status");   
    if(rideStatus.innerHTML === "ended") {
            window.location.href = "rating.html"
        return;
      }



        fetch("../services/watch-status-user.php")
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                const rideStatus = document.getElementById("status");
                rideStatus.innerHTML = data.status;
                if (rideStatus.innerHTML == "accepted")  {
                  rideStatus.style.backgroundColor = "green";
                  rideStatus.style.color = "white";}
                  else if (rideStatus.innerHTML == "started") {
                    rideStatus.style.backgroundColor = "gray";
                    rideStatus.style.color = "white";
                  } 
                  else if (rideStatus.innerHTML == "ended") {
                    rideStatus.style.backgroundColor = "red";
                    rideStatus.style.color = "white";
                  } else {
                    rideStatus.style.backgroundColor = "rgba(189, 226, 117, 0.631)";
                    rideStatus.style.color = "black";
                  }
                  document.getElementById("driver-name").innerHTML = data.firstName + " " + data.lastName;
                  document.getElementById("driver-phone").innerHTML = data.driverPhone;

            })
            .catch(error => {
                console.error('Error updating status:', error);
            });

}



