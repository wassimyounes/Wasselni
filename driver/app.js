const driverRegForm = document.getElementById("reg-form-driver");
const fname = document.getElementById("first-name");
const lname = document.getElementById("last-name");
const emailAddress = document.getElementById("email-address");
const phoneNum = document.getElementById("phone-number");
const vehicleType = document.getElementById("vehicle-type");
const vehicleMake = document.getElementById("vehicle-make");
const vehicleYear = document.getElementById("vehicle-year");
const vehicleLicense = document.getElementById("vehicle-license");

function submitForm() {

   if (fname.value == "" || lname.value == "" || emailAddress.value == "" || phoneNum.value == "" || vehicleType.value == "" || vehicleMake.value == "" || vehicleYear.value == "" || vehicleLicense.value == "") {
      return;
   } else {
      driverRegForm.addEventListener("submit", (e) => {
         e.preventDefault();
      })

      const formData = new FormData(driverRegForm);
      fetch("../services/driver-register-service.php", {
         method: "POST",
         body: formData
      })
         .then(res => res.json())
         .then(data => {
            console.log("message", data);
            document.getElementById('error').innerHTML = data;
         })
         .catch(err => {
            console.error("Error:", err);
            showNotificationRegister()
         });
   }

}
// to show registration completion notification if succesful
function showNotificationRegister() {
   document.getElementById("error").innerHTML = "";
   document.querySelector("section").style.opacity = "0.6";
   setTimeout(() => {
      document.getElementById("notification-register").style.visibility = "visible";
   }, 500)
}
//  to hide driver registration completion notification
function hideNotificationRegister() {
   document.getElementById("notification-register").style.visibility = "hidden";
   document.querySelector("section").style.opacity = "1";
   document.querySelectorAll("input, select").forEach((element) => {
      element.value = "";

   })
}


