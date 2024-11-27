document.addEventListener('DOMContentLoaded', () => {
    // Handle delete button click
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', () => {
            const row = button.closest('tr');
            const reviewId = row.dataset.reviewId;

            if (confirm(`Are you sure you want to delete review ID ${reviewId}?`)) {
                // Send delete request to the server
                fetch('delete_review.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ review_id: reviewId }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Remove the row from the table
                        row.remove();
                        alert('Review deleted successfully.');
                    } else {
                        alert('Failed to delete the review. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred. Please try again.');
                });
            }
        });
    });
});
