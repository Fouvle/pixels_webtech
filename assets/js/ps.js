document.addEventListener('DOMContentLoaded', () => {
    const endpoint = document.body.dataset.endpoint;
    const productsContainer = document.getElementById('products-container');

    // Fetch products from the backend
    console.log(endpoint);
    fetch(endpoint) // Replace with your PHP file's path
        .then(response => response.json())
        .then(products => {
            productsContainer.innerHTML = products.map(product => {
                // Generate rating stars
                const stars = Array(Math.floor(product.rating))
                    .fill('★')
                    .join('') + Array(5 - Math.floor(product.rating)).fill('☆').join('');

                return `
                    <div class="product-card">
                        <img src="${product.image_url}" alt="${product.name}">
                        <div class="product-info">
                            <h3>${product.name}</h3>
                            <p class="rating">${stars}</p>
                            <p class="price">$${product.price.toFixed(2)}</p>
                            <div class="tags">
                                ${product.tags
                                    ?.split(',')
                                    .map(tag => `<span class="tag">${tag.trim()}</span>`)
                                    .join('') || ''}
                            </div>
                        </div>
                    </div>
                `;
            }).join('');
        })
        .catch(error => console.error('Error fetching products:', error));
});