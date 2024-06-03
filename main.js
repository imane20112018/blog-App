const navItems = document.querySelector('.nav__items');
const openNavbtn = document.querySelector('#open__nav-btn');
const closeNavbtn = document.querySelector('#close__nav-btn');
// open nav dropdown
const openNav = () => {
    navItems.style.display = 'flex';
    openNavbtn.style.display = 'none';
    closeNavbtn.style.display = 'inline-block';
}
// close nav dropdown
const closeNav = () => {
    navItems.style.display = 'none';
    openNavbtn.style.display = 'inline-block';
    closeNavbtn.style.display = 'none';
}
openNavbtn.addEventListener('click', openNav);
closeNavbtn.addEventListener('click', closeNav);