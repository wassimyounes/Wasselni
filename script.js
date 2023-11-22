//  dom loaded
document.addEventListener("DOMContentLoaded", () => {
  console.log("DOM fully loaded and parsed");
  //  to toggle navbar
  const img = document.getElementById("back");
  const showSidebar = document.querySelector(".side-bar");
  img.addEventListener("click", () => {
    img.style.visibility = "hidden";
    showSidebar.style.display = "block";
  });

  const closeSidebar = document.querySelector(".close");
  closeSidebar.addEventListener("click", () => {
    showSidebar.style.display = "none";
    img.style.visibility = "visible";
  });
  // to change currrent location
  const link = document.getElementById("not-pickup");
  link.addEventListener("click", () => {
    const locator = document.getElementById("change-location");
    locator.style.visibility = "visible";
  });

  //  to hide current location setting window
  const hideWindow = function () {
    const locator = document.getElementById("change-location");
    locator.style.visibility = "hidden";
  };
  const downArrow = document.querySelector(".down-arrow");
  downArrow.addEventListener("click", () => {
    hideWindow();
  });

  //  to show map
  function showMap() {
    const iframe = document.getElementById("iframe-1");
    iframe.style.display = "block";
  }

  // to show SMS code window
  function showCodeWindow() {
    document.getElementById("submit-code").style.display = "flex";
  }

  // to hide SMS code window

  function hideCodeWindow() {
    document.getElementById("submit-code").style.display = "none";
  }

  //  to show driver notification (forgot password)

  function showNotification() {
    document.getElementById("notification").style.visibility = "visible";
  }

  //  to show driver notification (forgot password)
  function hideNotification() {
    document.getElementById("notification").style.visibility = "hidden";
  }

  //  to show driver registration completion notification

  function showNotificationRegister() {
    document.getElementById("notification-register").style.visibility =
      "visible";
  }

  //  to hide driver registration completion notification
  function hideNotificationRegister() {
    document.getElementById("notification-register").style.visibility =
      "hidden";
  }
});
// << dom loaded
//  to show map
function showMap() {
  const iframe = document.getElementById("iframe-1");
  iframe.style.display = "block";
}

// to show SMS code window
function showCodeWindow() {
  document.getElementById("submit-code").style.display = "flex";
}

// to hide SMS code window

function hideCodeWindow() {
  document.getElementById("submit-code").style.display = "none";
}

//  to show driver notification (forgot password)

function showNotification() {
  document.getElementById("notification").style.visibility = "visible";
}

//  to show driver notification (forgot password)
function hideNotification() {
  document.getElementById("notification").style.visibility = "hidden";
}

//  to show driver registration completion notification

function showNotificationRegister() {
  document.getElementById("notification-register").style.visibility = "visible";
}

//  to hide driver registration completion notification
function hideNotificationRegister() {
  document.getElementById("notification-register").style.visibility = "hidden";
}

//  to toggle driver's avialability button
document.addEventListener("DOMContentLoaded", () => {
  let btn = document.getElementById("btn-status");
  btn.addEventListener("click", () => {
    if (btn.className === "btn-status-available") {
      btn.className = "btn-status-unavailable";
      btn.innerHTML = "unavailable";
      document.getElementById("driver-portal-sct").style.visibility = "hidden";
      document.querySelector(".unavailable-screen").style.display = "block";
    } else {
      btn.className = "btn-status-available";
      btn.innerHTML = "available";
      document.getElementById("driver-portal-sct").style.visibility = "visible";
      document.querySelector(".unavailable-screen").style.display = "none";
    }
  });
});

//  validate forms
//  validate start page form
const validate = () => {
  document.addEventListener("DOMContentLoaded", () => {
    const fullNameUser = document.getElementById("fullnameuser");
    const numberUser = document.getElementById("phonenumberuser");
    const startSubmit = document.getElementById("start-submit");
    const validationError = document.getElementById("validation-error");
    const validationErrorPhone = document.getElementById("validation-error-phone");

    fullNameUser.addEventListener("input", () => {
      if (fullNameUser.value.match(/[^a-z|' ']/i)) {
        validationError.style.display = "block";
        validationError.innerHTML = "No special characters or numbers allowed";
      } else {
        validationError.innerHTML = "";
        validationError.style.display = "none";
      }
    });
    numberUser.addEventListener("input", () => {
      const inptValue = numberUser.value;
      const length = inptValue.length;
      if (!inptValue.match(/(03|70|71|76|78|79|81)/)) {
        validationErrorPhone.style.display = "block";
        validationErrorPhone.innerHTML = "Invalid dial code ";
      }
      else if (length > 8) {
        validationErrorPhone.style.display = "block";
        validationErrorPhone.innerHTML = "Invalid phone number";
      } 
      else if (inptValue.match(/[' ']/)) {
           validationErrorPhone.style.display = "block";
      validationErrorPhone.innerHTML = "no space or special characterd allowed";   
      }
   

      else {
        validationErrorPhone.innerHTML = "";
        validationErrorPhone.style.display = "none";
      }
    });

  });
};
validate();