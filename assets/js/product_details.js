document.addEventListener('DOMContentLoaded', () => {
    const commentForm = document.getElementById('comment-form');
    const commentTextarea = document.getElementById('comment-textarea');
    const ratingInput = document.getElementById('rating');
    const commentBox = document.getElementById('comment-box');
    const commentsArray = []; // To store comments with ratings

    // Function to display comments and ratings dynamically
    const displayComments = () => {
        // Clear the existing comments
        commentBox.innerHTML = '';

        if (commentsArray.length === 0) {
            commentBox.innerHTML = '<p>No reviews yet. Be the first to leave one!</p>';
            return;
        }

        // Create and append each review element
        commentsArray.forEach((review, index) => {
            const reviewDiv = document.createElement('div');
            reviewDiv.classList.add('review');

            // Add comment text
            const commentText = document.createElement('p');
            commentText.textContent = review.comment;

            // Add rating
            const ratingText = document.createElement('span');
            ratingText.classList.add('rating-display');
            ratingText.textContent = `Rating: ${review.rating.toFixed(1)} / 5`;

            // Add delete button
            const deleteButton = document.createElement('button');
            deleteButton.textContent = 'Delete';
            deleteButton.classList.add('delete-btn');
            deleteButton.addEventListener('click', () => {
                commentsArray.splice(index, 1); // Remove the review from the array
                displayComments(); // Update the UI
            });

            // Append all elements to the review div
            reviewDiv.appendChild(commentText);
            reviewDiv.appendChild(ratingText);
            reviewDiv.appendChild(deleteButton);

            // Append the review div to the comment box
            commentBox.appendChild(reviewDiv);
        });
    };

    // Handle form submission
    commentForm.addEventListener('submit', (e) => {
        e.preventDefault(); // Prevent form submission from refreshing the page

        const commentText = commentTextarea.value.trim();
        const ratingValue = parseFloat(ratingInput.value);

        // Validate inputs
        if (!commentText) {
            alert('Please write a comment before submitting.');
            return;
        }
        if (isNaN(ratingValue) || ratingValue < 0 || ratingValue > 5) {
            alert('Please provide a valid rating between 0.0 and 5.0.');
            return;
        }

        // Add the new review to the array
        commentsArray.push({ comment: commentText, rating: ratingValue });

        // Update the display
        displayComments();

        // Clear the form fields
        commentTextarea.value = '';
        ratingInput.value = '';
    });

    // Initialize the comments section
    displayComments();
});

// Wishlist Notification
document.addEventListener('DOMContentLoaded', () => {
    const addToWishlistButton = document.querySelector('button:last-child');

    if (addToWishlistButton) {
        addToWishlistButton.addEventListener('click', () => {
            const productName = document.querySelector('h1')?.textContent || 'product';

            const notification = document.createElement('div');
            notification.className = 'fixed top-4 right-4 bg-blue-500 text-white px-4 py-2 rounded shadow-lg';
            notification.textContent = `Added ${productName} to wishlist`;
            document.body.appendChild(notification);

            setTimeout(() => {
                document.body.removeChild(notification);
            }, 3000);
        });
    }
});
