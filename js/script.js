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

// MEDIA QUERIES TABLETS
// responsive nav
// const menuLinks =document.querySelector('.nav-links');
const showMenu = document.querySelector('.open-icon');
const hideMenu = document.querySelector('.close-icon');
const headerContainer= document.querySelector('.container');
const navigationBar= document.querySelector('.navigation-bar');

showMenu.addEventListener('click', function(){
    // headerContainer.style.backgroundColor = "#343A40";
    navigationBar.style.display = 'block';
    showMenu.style.display = 'none';
    hideMenu.style.display = 'block';
});

hideMenu.addEventListener('click', function(){
    navigationBar.style.display = 'none'
    showMenu.style.display = 'block'
    hideMenu.style.display = 'none';
});


// Contact Us via whatsapp
function sendWhatsapp(){

    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var subject = document.getElementById('subject').value;
    var message = document.getElementById('message').value;
    
    var url ="https://wa.me/+237681526616?text="
    +"*Name :* " +name+"%0a"
    +"*Email :* " +email+"%0a"
    +"*Subject :* " +subject+"%0a"
    +"*Message :* " +message+"%0a%0a"
    
    
    window.open(url,'_blank').focus();
    };


