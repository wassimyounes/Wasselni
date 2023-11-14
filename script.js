

window.onload = function () {

    const link = document.getElementById('not-pickup');
    link.addEventListener('click', () => {

        const locator = document.getElementById('change-location');
        locator.style.display = 'flex';
    })

}




const hideWindow = function () {

    const locator = document.getElementById('change-location');

    locator.style.display = 'none';
}
const downArrow = document.querySelector('.down-arrow');
downArrow.addEventListener('click', () => {
    hideWindow()
})




function showMap() {
    const iframe = document.getElementById('iframe-1');

    iframe.style.display = 'block';
}




function proceedToCode() {
    document.getElementById('form-shown').style.display = 'none';
    document.getElementById('form-hidden').style.display = 'block';
    document.getElementById('shown-next').style.display = 'block';
}




function showCodeWindow() {
    document.getElementById('submit-code').style.display = 'flex';
}



function hideCodeWindow() {
    document.getElementById('submit-code').style.display = 'none';

}
document.getElementById('down-arrow-code').addEventListener('click', () => {
    console.log('hello')
    hideCodeWindow();
})





