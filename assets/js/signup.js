// document.addEventListener('DOMContentLoaded', function() {
//     const signupForm = document.getElementById('signupForm');
//     const firstName = document.getElementById('firstName');
//     const lastName = document.getElementById('lastName');
//     const email = document.getElementById('email');
//     const password = document.getElementById('password');
//     const confirmPassword = document.getElementById('confirmPassword');
// /*
//     const firstNameError = document.getElementById('firstNameError');
//     const lastNameError = document.getElementById('lastNameError');
//     const emailError = document.getElementById('emailError');
//     const passwordError = document.getElementById('passwordError');
//     const confirmPasswordError = document.getElementById('confirmPasswordError');
// */
//     signupForm.addEventListener('submit', function(e) {
//         e.preventDefault();
//         let isValid = true;

//         // First Name validation
//         if (!firstName.value.trim()) {
//             firstNameError.textContent = 'First name is required';
//             isValid = false;
//         } else {
//             firstNameError.textContent = '';
//         }

//         // Last Name validation
//         if (!lastName.value.trim()) {
//             lastNameError.textContent = 'Last name is required';
//             isValid = false;
//         } else {
//             lastNameError.textContent = '';
//         }

//         // Email validation
//         if (!email.value.trim()) {
//             emailError.textContent = 'Email is required';
//             isValid = false;
//         } else if (!isValidEmail(email.value)) {
//             emailError.textContent = 'Please enter a valid email address';
//             isValid = false;
//         } else {
//             emailError.textContent = '';
//         }

//         // Password validation
//         if (!password.value) {
//             passwordError.textContent = 'Password is required';
//             isValid = false;
//         } else if (!isValidPassword(password.value)) {
//             passwordError.textContent = 'Password must be at least 8 characters long, contain at least one uppercase letter, three digits, and one special character';
//             isValid = false;
//         } else {
//             passwordError.textContent = '';
//         }

//         // Confirm Password validation
//         if (!confirmPassword.value) {
//             confirmPasswordError.textContent = 'Please confirm your password';
//             isValid = false;
//         } else if (password.value !== confirmPassword.value) {
//             confirmPasswordError.textContent = 'Passwords do not match';
//             isValid = false;
//         } else {
//             confirmPasswordError.textContent = '';
//         }

//         if (isValid) {
//             // Form is valid, you can submit it here
//             alert('Sign up successful!');
//         }
//     });

//     function isValidEmail(email) {
//         const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
//         return emailRegex.test(email);
//     }

//     function isValidPassword(password) {
//         const passwordRegex = /^(?=.*[A-Z])(?=.*\d.*\d.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/;
//         return passwordRegex.test(password);
//     }
// });
document.addEventListener("DOMContentLoaded", function () {
    const signupForm = document.getElementById("signup");
    const passwordField = document.getElementById("password");
    const confirmPasswordField = document.getElementById("confirm-password");
    const emailField = document.getElementById("email");
  
    signupForm.addEventListener("submit", function (e) {
      let valid = true;
  
      // Validate First Name
      const fname = document.getElementById("fname").value.trim();
      if (fname === "") {
        alert("First name is required.");
        valid = false;
      }
  
      // Validate Last Name
      const lname = document.getElementById("lname").value.trim();
      if (lname === "") {
        alert("Last name is required.");
        valid = false;
      }
  
      // Validate Username
      const username = document.getElementById("username").value.trim();
      if (username === "") {
        alert("Username is required.");
        valid = false;
      }
  
      // Validate Email
      const email = emailField.value.trim();
      const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
      if (!emailRegex.test(email)) {
        alert("Please enter a valid email address.");
        valid = false;
      }
  
      // Validate Password
      const password = passwordField.value.trim();
      if (password.length < 6) {
        alert("Password must be at least 6 characters.");
        valid = false;
      }
  
      // Validate Confirm Password
      const confirmPassword = confirmPasswordField.value.trim();
      if (confirmPassword !== password) {
        alert("Password and confirm password do not match.");
        valid = false;
      }
  
      if (!valid) {
        e.preventDefault(); // Prevent form submission if validation fails
      }
    });
  });
  