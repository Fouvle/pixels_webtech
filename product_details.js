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