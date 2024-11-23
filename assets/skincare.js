document.addEventListener('DOMContentLoaded', () => {
    const filterButton = document.querySelector('button:has(svg)');
    const productGrid = document.querySelector('.grid');
    const addToCartButtons = document.querySelectorAll('button:last-child');

    // Filter button functionality
    filterButton.addEventListener('click', () => {
        const filterModal = document.createElement('div');
        filterModal.innerHTML = `
            <div class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
                <div class="bg-white p-6 rounded-lg w-96">
                    <h3 class="text-xl font-bold mb-4">Filter Skincare Products</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block mb-2">Price Range</label>
                            <input type="range" min="0" max="100" class="w-full">
                        </div>
                        <div>
                            <label class="block mb-2">Skin Type</label>
                            <select class="w-full border p-2 rounded">
                                <option>All</option>
                                <option>Dry Skin</option>
                                <option>Oily Skin</option>
                                <option>Combination Skin</option>
                                <option>Sensitive Skin</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-2">Brand</label>
                            <select class="w-full border p-2 rounded">
                                <option>All Brands</option>
                                <option>Sustainable Beauty Co.</option>
                                <option>Eco Glow</option>
                                <option>Green Essence</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-6 flex justify-between">
                        <button class="cancel-filter bg-gray-200 px-4 py-2 rounded">Cancel</button>
                        <button class="apply-filter bg-pink-600 text-white px-4 py-2 rounded">Apply</button>
                    </div>
                </div>
            </div>
        `;
        document.body.appendChild(filterModal);

        // Close modal events
        filterModal.querySelector('.cancel-filter').addEventListener('click', () => {
            document.body.removeChild(filterModal);
        });
        filterModal.querySelector('.apply-filter').addEventListener('click', () => {
            // Implement actual filtering logic here
            document.body.removeChild(filterModal);
        });
    });

    // Add to Cart functionality
    addToCartButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            const product = e.target.closest('div');
            const productName = product.querySelector('h3').textContent;
            const productPrice = product.querySelector('p:last-child').textContent;

            // Simple cart addition - in real app, this would interact with cart system
            const cartNotification = document.createElement('div');
            cartNotification.className = 'fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded shadow-lg';
            cartNotification.textContent = `Added ${productName} to cart`;
            document.body.appendChild(cartNotification);

            // Remove notification after 3 seconds
            setTimeout(() => {
                document.body.removeChild(cartNotification);
            }, 3000);
        });
    });
});