
const email = document.getElementById("email");
const password = document.getElementById("password");

document.getElementById("form-box").addEventListener('submit',function(event){
    event.preventDefault();

    //Ensures that previous errors are cleared
    document.querySelectorAll('.error').forEach(function(error){
        error.remove();
    })

    let isvalid = true;

    //Ensures that the user enters a valid email address
    const emailRegex = /^\w+a[a-zA-Z]+\.[a-zA-Z]{2,4}$/;
    if (email.value===""||!emailRegex.test(email.value)){
        errorMessage("email","Please enter a valid email");
        isvalid = false;
    }

    //Ensures that the user's password satisfies the necessary conditions
    const passwordRegex = /^(?=.*[A-Z])(?=.*\d{3,})(?=.*\W).{8,}$/;
    if ((password==="")||!passwordRegex.test(password.value)){
        errorMessage("password","Please enter a valid password");
        isvalid = false;
    }
});

//Displays error message
function errorMessage(fieldID,message){
let field = document.getElementById(fieldID);
let error = document.createElement('span');
error.classname = 'error';
error.innerHTML = message;

field.insertAdjacentElement("afterend",error);

}