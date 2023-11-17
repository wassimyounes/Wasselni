
// to change currrent location
window.onload = function () {

    const link = document.getElementById('not-pickup');
    link.addEventListener('click', () => {

        const locator = document.getElementById('change-location');
        locator.style.visibility = 'visible';
    })

}





//  to hide current location setting window
const hideWindow = function () {

    const locator = document.getElementById('change-location');

    locator.style.visibility = 'hidden';
}
const downArrow = document.querySelector('.down-arrow');
downArrow.addEventListener('click', () => {
    hideWindow()
})



//  to show map
function showMap() {
    const iframe = document.getElementById('iframe-1');

    iframe.style.display = 'block';
}




// to show SMS code window
function showCodeWindow() {
    document.getElementById('submit-code').style.display = 'flex';
}


// to hide SMS code window
function hideCodeWindow() {
    document.getElementById('submit-code').style.display = 'none';

}
document.getElementById('down-arrow-code').addEventListener('click', () => {
    hideCodeWindow();
})




//  to show driver notification (forgot password)

function showNotification() {
    document.getElementById('notification').style.visibility = 'visible';


}

//  to show driver notification (forgot password)
function hideNotification() {
    document.getElementById('notification').style.visibility = 'hidden';

}

//  to show driver registration completion notification

function showNotificationRegister() {
    document.getElementById('notification-register').style.visibility = 'visible';


}

//  to hide driver registration completion notification
function hideNotificationRegister() {
    document.getElementById('notification-register').style.visibility = 'hidden';

}









