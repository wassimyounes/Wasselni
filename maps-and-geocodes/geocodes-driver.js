

document.addEventListener("DOMContentLoaded", () => {
  let cards = document.querySelectorAll(".info-cards");


  const fetchLocation = async (card, result) => {
    let coordinates = card.textContent.trim().split(",");
    let latitude = coordinates[0]
    let longitude = coordinates[1]

    const location = await getPlaceName(latitude, longitude);
    result.innerHTML = location;
  }


  const getPlaceName = async (latitude, longitude) => {
    const nominatimUrl = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${latitude}&lon=${longitude}`;

    try {
      const response = await fetch(nominatimUrl);
      const data = await response.json();

      if (data && data.display_name) {
        return data.display_name;
      } else {
        return 'Location not found';
      }
    } catch (error) {
      console.error('Error fetching location:', error);
      return 'Error fetching location';
    }

  };
  cards.forEach((card) => {
    let startCoords = card.querySelector(".start-l")
    let endCoords = card.querySelector(".end-l")
    let startField = card.querySelector(".from-loc")
    let toField = card.querySelector(".to-loc")

    fetchLocation(startCoords, startField);
    fetchLocation(endCoords, toField);

  });


  cards.forEach(function (card) {
    let startC = card.querySelector(".start-l");
    let endC = card.querySelector(".end-l");

    let coordinatesFrom = startC.textContent.split(',');
    let coordinatesTo = endC.textContent.split(',');
    const lat1 = parseFloat(coordinatesFrom[0]);
    const lon1 = parseFloat(coordinatesFrom[1]);
    const lat2 = parseFloat(coordinatesTo[0]);
    const lon2 = parseFloat(coordinatesTo[1]);


    const distance = calculateHaversine(lat1, lon1, lat2, lon2);

    const speed = 70;
    const time = distance / speed;

    // Update existing paragraphs within the div
    const distanceParagraph = card.querySelector(".distance");
    distanceParagraph.textContent = distance.toFixed(2) + " km";
    const timeParagraph = card.querySelector(".time");
    if (time < 1) {
      console.log(time * 60)
      timeParagraph.textContent = time.toFixed(2) * 60 + " minutes";
    } else {
      timeParagraph.textContent = time.toFixed(2) + " hours";
    }



  });

  function calculateHaversine(lat1, lon1, lat2, lon2) {
    const R = 6371; // Earth's radius in km

    const dLat = (lat2 - lat1) * (Math.PI / 180);
    const dLon = (lon2 - lon1) * (Math.PI / 180);

    const a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
      Math.cos(lat1 * (Math.PI / 180)) * Math.cos(lat2 * (Math.PI / 180)) *
      Math.sin(dLon / 2) * Math.sin(dLon / 2);

    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

    const distance = R * c;
    return distance;
  }
});


// add locations to local storage 

document.querySelectorAll(".accept").forEach((btn) => {
btn.addEventListener("click", () => {
const pickUp = btn.parentElement.childNodes[2].childNodes[1].innerHTML;
const drop = btn.parentElement.childNodes[4].childNodes[1].innerHTML;
localStorage.setItem("start", pickUp);
localStorage.setItem("end", drop)
console.log(pickUp)
console.log(drop)
})

})


