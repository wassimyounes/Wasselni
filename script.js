
// to change currrent location
window.onload = function () {

    const link = document.getElementById('not-pickup');
    link.addEventListener('click', () => {

        const locator = document.getElementById('change-location');
        locator.style.display = 'flex';
    })

}



//  to hide current location setting window
const hideWindow = function () {

    const locator = document.getElementById('change-location');

    locator.style.display = 'none';
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



//  to show SMS code window
// function proceedToCode() {
//     document.getElementById('form-shown').style.display = 'none';
//     document.getElementById('form-hidden').style.display = 'block';
//     document.getElementById('shown-next').style.display = 'block';
// }



// to show SMS code window
function showCodeWindow() {
    document.getElementById('submit-code').style.display = 'flex';
}


// to hide SMS code window
function hideCodeWindow() {
    document.getElementById('submit-code').style.display = 'none';

}
document.getElementById('down-arrow-code').addEventListener('click', () => {
    console.log('hello')
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