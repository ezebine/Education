'Use strict mode'


// highlighting links
const activePage = window.location.pathname;

const navLinks = document.querySelectorAll('.nav-links a')
for(let i=0; i<navLinks.length; i++){
    if(navLinks[i].href.includes(`${activePage}`)){
navLinks[i].classList.add('home')
    }
};

// // sticky header
const nav = document.querySelector('header');

window.addEventListener('scroll', function(){
if(window.scrollY > nav.offsetHeight + 160){
    nav.classList.add('active');
}
else{
    nav.classList.remove('active');
}
});

// // REVEALING ELEMENTS ON SCROLL
const reveals = document.querySelectorAll('.reveal')
window.addEventListener('scroll', function() {

for(let i=0; i<=reveals.length; i++){

    let windowHeight = window.innerHeight;
    let revealTop = reveals[i].getBoundingClientRect().top;
    let revealPoint = 100;

    if(revealTop < windowHeight - revealPoint){
        reveals[i].classList.add('reveal-section');
    }
    else{
        reveals[i].classList.remove('reveal-section');
    }
}
})

// sign Up button on click
const signupButton = document.querySelector('.signup-btn');
const signupModal = document.querySelector('.signup-form');
const overlay = document.querySelector('.overlay');

signupButton.addEventListener('click', function(){
    signupModal.classList.remove('modal-hidden');
    overlay.classList.remove('modal-hidden');
})


// MEDIA QUERIES TABLETS
// responsive nav
const menuLinks =document.querySelector('.nav-links');
const showMenu = document.querySelector('.open-icon');
const hideMenu = document.querySelector('.close-icon');

showMenu.addEventListener('click', function(){
    menuLinks.style.display = 'block'
    showMenu.style.display = 'none'
    hideMenu.style.display = 'block';
})

hideMenu.addEventListener('click', function(){
    menuLinks.style.display = 'none'
    showMenu.style.display = 'block'
    hideMenu.style.display = 'none';
})
