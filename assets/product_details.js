// Select the textarea, buttons, and comments container
const field = document.getElementById('comment-textarea');
const clear = document.getElementById('clear');
const submit = document.getElementById('submit');
const comments = document.getElementById('comment-box');

// Array to store the comments
const comments_arr = [];

// Function to generate and display the comments list dynamically
const display_comments = () => {
  if (comments_arr.length === 0) {
    comments.innerHTML = '<p>No comments yet. Be the first to comment!</p>';
    return;
  }

  let list = '<ul>';
  comments_arr.forEach(comment => {
    list += `<li>${comment}</li>`;
  });
  list += '</ul>';
  comments.innerHTML = list;
};

// Clear button functionality
clear.onclick = function (event) {
  event.preventDefault();
  comments_arr.length = 0;
  display_comments();
  field.value = '';
};

// Submit button functionality
submit.onclick = function (event) {
  event.preventDefault();
  const content = field.value.trim(); // Trim to remove excess whitespace
  if (content.length > 0) {
    // Add the comment to the array
    comments_arr.push(content);
    // Regenerate the comment HTML list
    display_comments();
    // Reset the textarea content
    field.value = '';
  } else {
    // Alert if the textarea is empty
    alert('Please enter a comment before submitting!');
  }
};

// Initialize the comments section with a default message
display_comments();

document.addEventListener('DOMContentLoaded', () => {
    const addToCartButton = document.querySelector('button:first-child');
    const addToWishlistButton = document.querySelector('button:last-child');

    addToCartButton.addEventListener('click', () => {
        const productName = document.querySelector('h1').textContent;
        const productPrice = document.querySelector('.text-pink-600').textContent;

        const notification = document.createElement('div');
        notification.className = 'fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded shadow-lg';
        notification.textContent = `Added ${productName} to cart`;
        document.body.appendChild(notification);

        setTimeout(() => {
            document.body.removeChild(notification);
        }, 3000);
    });

    addToWishlistButton.addEventListener('click', () => {
        const productName = document.querySelector('h1').textContent;

        const notification = document.createElement('div');
        notification.className = 'fixed top-4 right-4 bg-blue-500 text-white px-4 py-2 rounded shadow-lg';
        notification.textContent = `Added ${productName} to wishlist`;
        document.body.appendChild(notification);

        setTimeout(() => {
            document.body.removeChild(notification);
        }, 3000);
    });
});
