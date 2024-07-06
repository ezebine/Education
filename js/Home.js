'Use strict mode'

const faqs = document.querySelectorAll('.faq');

faqs.forEach(faq => {
    faq.addEventListener('click', function(){
        faq.classList.toggle('open');
    
    const icon = faq.querySelector('.faq-icon i');
    if(icon.className === 'bi bi-plus'){
        icon.className = "bi bi-dash";
    }
    else{
        icon.className ='bi bi-plus'
    }
})

});