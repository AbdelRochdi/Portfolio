const hamburger = document.querySelector('.menu-toggler');
const topNav = document.querySelector('.top-nav');

hamburger.addEventListener('click',navOpen)


function navOpen() {
    hamburger.classList.toggle('open');
    topNav.classList.toggle('open');
}

AOS.init({
    easing : 'ease',
    duration: 1800,
    once:true
});