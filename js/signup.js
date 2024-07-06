'Use strict mode'

const signupForm = document.querySelector('.form');
const userName = document.getElementById('username');
const myEmail = document.getElementById('email');
const password1 = document.getElementById('password');
const password2 = document.getElementById('confirmPassword');
const checkbox = document.getElementById('terms');

signupForm.addEventListener('submit', function(e){
    e.preventDefault();

    checkRequired();
});

function showError(input, message){
    const myForm = input.parentElement;
    myForm.className = 'form-group error';
    const errorMsg = myForm.querySelector('.err');
    errorMsg.innerText = message;
}

// Show input success message
function showSuccess(input){
    const myForm = input.parentElement;
    myForm.className = 'form-group success';
}


// check if email is valid
function isValidEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

// check required fields
function checkRequired (){
    const usernameValue = userName.value.trim();
    const emailValue = myEmail.value.trim();
    const passwordValue = password1.value.trim();
    const password2Value = password2.value.trim();
    
// Checking user name
    if(usernameValue === '') {
        showError(userName, 'Username is required');
    } 
    else {
        showSuccess(userName);
    }


// Checking email
    if(emailValue === '') {
        showError(myEmail, 'Email is required');
    } 
    else if (!isValidEmail(emailValue)) {
        showError(myEmail, 'Provide a valid email address');
    } 
    else {
        showSuccess(myEmail);
    }

// Checking password
    if(passwordValue === '') {
        showError(password1, 'Password is required');
    } 
    else if (passwordValue.length < 8 ) {
        showError(password1, 'Password must be at least 8 character.')
    } 
    else {
        showSuccess(password1);
    }

// Confirming password
    if(password2Value === '') {
        showError(password2, 'Please confirm your password');
    } 
    else if (password2Value !== passwordValue) {
        showError(password2, "Passwords don't match");
    } 
    else {
        showSuccess(password2);
    }
}
    
   





// ()