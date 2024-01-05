
// to get current location
document.getElementById("my-location").addEventListener("click", () => {
  getCurrent()
    .then((coordinates) => {
      console.log("two " + coordinates)
      fetchLocation(coordinates);
    })
    .catch((error) => {
      console.error(error.message)
    })
})

function getCurrent() {
  return new Promise((resolve, reject) => {
    if ("geolocation" in navigator) {
      navigator.geolocation.getCurrentPosition((position) => {
        const coordinates = position.coords.latitude + ", " + position.coords.longitude;

        resolve(coordinates);
        console.log("one " + coordinates)
      },
        (error) => {
          reject(error);
        }
      );
    } else {
      reject(new Error("Geolocation is not supported"));
    }
  })
}





// to fetch pick up 

const fetchLocation = async (coordinates) => {
  const resultInput = document.getElementById('pickup-location');

  let coords = coordinates.split(',').map(coord => parseFloat(coord.trim()));

  if (!isNaN(coords[0]) && !isNaN(coords[1])) {
    const location = await getPlaceName(coords[0], coords[1]);
    resultInput.value = location;
  } else {
    resultParagraph.textContent = 'Invalid coordinates. Please enter in the format "latitude, longitude".';
  }
};

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


/////////////

//  to show location and trip information
function showInfo() {
  setTimeout(() => {
    const locator = document.getElementById("trip-info");
    locator.style.visibility = "visible";
  }, 200)
}



// to hide location and trip information
const hideWindow = function () {
  const locator = document.getElementById("trip-info");
  locator.style.visibility = "hidden";
  locator.style.transition = "all .2s"
  // location.reload();

};
const downArrow = document.querySelector(".down-arrow");
downArrow.addEventListener("click", () => {
  hideWindow();
});

// trip info and distance details appearance 
const tripDTF = document.getElementById("trip-dtf"); // distance, time, fare
document.getElementById("trip-icon").addEventListener("click", () => {
  console.log("clicked")
  tripDTF.classList.toggle("trip-dtf-hidden");
})

// points suggestions for from-input 

// function getSuggestions1() {
//     const input1 = document.getElementById('pickup-location').value;

//     if (input1.trim() !== '') {
//         fetch(`https://nominatim.openstreetmap.org/search?q=${input1}&format=json`)
//             .then(response => response.json())
//             .then(data => displaySuggestions1(data));
//     } else {
//         document.getElementById('suggestions-pickup').innerHTML = '';
//     }
// }
// document.getElementById('pickup-location').addEventListener("input", getSuggestions1)
// function displaySuggestions1(suggestions) {
//     let suggestionsDiv = document.getElementById('suggestions-pickup');

//     suggestionsDiv.innerHTML = '';

//     suggestions.forEach(suggestion => {
//         let suggestionItem = document.createElement('div');
//         suggestionItem.textContent = suggestion.display_name;
//         suggestionItem.addEventListener('click', () => {
//             document.getElementById('pickup-location').value = suggestion.display_name;
//             suggestionsDiv.innerHTML = '';
//         });
//         suggestionsDiv.appendChild(suggestionItem);
//     });
// }

// // points suggestions for to-input 

// function getSuggestions2() {
//     const input2 = document.getElementById('drop-location').value;

//     if (input2.trim() !== '') {
//         fetch(`https://nominatim.openstreetmap.org/search?q=${input2}&format=json`)
//             .then(response => response.json())
//             .then(data => displaySuggestions2(data));
//     } else {
//         document.getElementById('suggestions-drop').innerHTML = '';
//     }
// }
// document.getElementById('drop-location').addEventListener("input", getSuggestions2)
// function displaySuggestions2(suggestions) {
//     let suggestionsDiv = document.getElementById('suggestions-drop');

//     suggestionsDiv.innerHTML = '';

//     suggestions.forEach(suggestion => {
//         let suggestionItem = document.createElement('div');
//         suggestionItem.textContent = suggestion.display_name;
//         suggestionItem.addEventListener('click', () => {
//             document.getElementById('drop-location').value = suggestion.display_name;
//             suggestionsDiv.innerHTML = '';
//         });
//         suggestionsDiv.appendChild(suggestionItem);
//     });
// }

// measurong distance - trip info
function measureDistance() {
  const location1 = document.getElementById('pickup-location').value.trim();
  const location2 = document.getElementById('drop-location').value.trim();
  if (location1 === '' || location2 === '') {
    document.getElementById("alert-input").innerHTML = "Please enter locations";
    return;
  } else {
    localStorage.setItem("from", JSON.stringify(location1));
    localStorage.setItem("to", JSON.stringify(location2));
    showInfo();
    document.getElementById("alert-input").innerHTML = "";
  }

  // Fetch coordinates for the entered locations
  const coordinates1 = getCoordinates(location1);
  const coordinates2 = getCoordinates(location2);

  Promise.all([coordinates1, coordinates2])
    .then(([coord1, coord2]) => {
      document.getElementById("fCoords").innerHTML = "Coords for " + location1 + ": " + coord1.latitude + ", " + coord1.longitude;
      document.getElementById("tCoords").innerHTML = "Coords for " + location2 + ": " + coord2.latitude + ", " + coord2.longitude;
      const distance = calculateDistance(coord1, coord2) + 5;

      // Display the results
      document.getElementById('distance').innerHTML = `Distance to travel: ${distance.toFixed(2)} km`;
      if (distance / 80 < 1) {
        document.getElementById('time').innerHTML = `Estimated travel time: ${(distance / 80 * 60).toFixed(2)} min`;
      } else {
        document.getElementById('time').innerHTML = `Estimated travel time: ${(distance / 80).toFixed(2)} hrs`;
      }
      document.getElementById('fare').innerHTML = `Estimated fare: ${(distance * 0.1).toFixed(2)} $`;

      localStorage.setItem("fromCoordinates", JSON.stringify(coord1));
      localStorage.setItem("toCoordinates", JSON.stringify(coord2));

    })
    .catch(error => {
      console.error('Error fetching coordinates:', error);
      alert('Error fetching coordinates. Please try again.');
    });
}


async function getCoordinates(location) {
  const apiUrl = `https://nominatim.openstreetmap.org/search?q=${encodeURIComponent(location)}&format=json`;

  const response = await fetch(apiUrl);
  const data = await response.json();
  if (data.length > 0) {
    const coordinates = {
      latitude: parseFloat(data[0].lat),
      longitude: parseFloat(data[0].lon)
    };
    return coordinates;
  } else {
    throw new Error('No results found for the location.');
  }
}
// calculate distance
function calculateDistance(coord1, coord2) {
  const R = 6371;

  const dLat = deg2rad(coord2.latitude - coord1.latitude);
  const dLon = deg2rad(coord2.longitude - coord1.longitude);

  const a =
    Math.sin(dLat / 2) * Math.sin(dLat / 2) +
    Math.cos(deg2rad(coord1.latitude)) * Math.cos(deg2rad(coord2.latitude)) *
    Math.sin(dLon / 2) * Math.sin(dLon / 2);

  const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

  return R * c;
}

function deg2rad(deg) {
  return deg * (Math.PI / 180);
}