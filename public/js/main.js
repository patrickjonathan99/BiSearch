const burgerIcon = document.querySelector('#burger');
const navbarMenu = document.querySelector('#navLink');

burgerIcon.addEventListener('click', () => (
    navbarMenu.classList.toggle('is-active')
))
