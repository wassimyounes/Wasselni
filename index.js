const img = document.getElementById('back');
const showSidebar = document.querySelector('.side-bar');
img.addEventListener('click', () => {
    img.style.visibility = 'hidden';
    showSidebar.style.display = 'block'
})




const closeSidebar = document.querySelector('.close');
closeSidebar.addEventListener('click', () => {
    showSidebar.style.display = 'none';
    img.style.visibility = 'visible'
})




