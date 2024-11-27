document.addEventListener("DOMContentLoaded", () => {
  // Hero Section
  const heroSection = document.getElementById("hero-section");
  if (heroSection) {
    heroSection.innerHTML = `
      <div class="max-w-6xl mx-auto px-4 py-16">
        <div class="max-w-2xl">
          <h1 class="text-4xl font-bold mb-4">Discover Beauty that's Kind to You and the Planet</h1>
          <p class="text-xl text-gray-600 mb-8">
            Your trusted guide to sustainable skincare and makeup products that align with your values
          </p>
          <div class="flex gap-4">
            <div class="flex-1 max-w-md relative">
              <input type="text" placeholder="Search sustainable products..." class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent"/>
              <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-400">
                <!-- Search Icon -->
                <path d="M16 14l-3.4-3.4"></path>
                <circle cx="7" cy="7" r="6"></circle>
              </svg>
            </div>
            <button class="bg-pink-600 text-white px-6 py-2 rounded-lg hover:bg-pink-700 flex items-center gap-2">
              Find Products
              <svg class="h-4 w-4">
                <!-- Button Icon -->
                <path d="M9 3L4 8h5V3zM9 3l5 5H9z"/>
              </svg>
            </button>
          </div>
        </div>
      </div>
    `;
  }

  // Features Section
  const featuresSection = document.getElementById("features-section");
  if (featuresSection) {
    const features = [
      {
        icon: '<svg class="h-5 w-5 text-pink-600">...</svg>',
        title: "Verified Clean Beauty",
        description: "Track and compare sustainable skincare and makeup products with transparent ingredient and packaging information."
      },
      {
        icon: '<svg class="h-5 w-5 text-pink-600">...</svg>',
        title: "Ethical Standards",
        description: "All products are cruelty-free, use ethical sourcing practices, and maintain high environmental standards."
      },
      {
        icon: '<svg class="h-5 w-5 text-pink-600">...</svg>',
        title: "Clean Beauty Guide",
        description: "Learn about sustainable ingredients, eco-friendly packaging, and how to build a conscious beauty routine."
      }
    ];

    let featuresHTML = '';
    features.forEach(feature => {
      featuresHTML += `
        <div class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
          <div class="flex items-center gap-2">
            ${feature.icon}
            <h3 class="text-lg font-medium">${feature.title}</h3>
          </div>
          <p class="mt-2">${feature.description}</p>
        </div>
      `;
    });
    featuresSection.innerHTML = `<div class="grid md:grid-cols-3 gap-8">${featuresHTML}</div>`;
  }

  // Featured Products Section
  const featuredProductsSection = document.getElementById("featured-products");
  if (featuredProductsSection) {
    const products = [
      {
        name: "Sustainable Face Serum",
        brand: "Pure Botanics",
        image: "/api/placeholder/300/300",
        price: "$48",
        rating: 4.8
      },
      {
        name: "Eco-Friendly Lip Balm",
        brand: "Eco Beauty",
        image: "/api/placeholder/300/300",
        price: "$22",
        rating: 4.5
      }
    ];

    let productsHTML = '';
    products.forEach(product => {
      productsHTML += `
        <div class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
          <div class="aspect-square bg-gray-100 rounded-lg mb-4">
            <img src="${product.image}" alt="${product.name}" class="w-full h-full object-cover rounded-lg" />
          </div>
          <p class="text-sm text-gray-600">${product.brand}</p>
          <h3 class="font-medium">${product.name}</h3>
          <div class="flex items-center gap-1">
            <svg class="h-4 w-4 fill-yellow-400 text-yellow-400">
              <!-- Rating Icon -->
              <path d="M9 3L4 8h5V3zM9 3l5 5H9z"/>
            </svg>
            <span class="text-sm text-gray-600">${product.rating}</span>
          </div>
          <p class="font-medium">${product.price}</p>
        </div>
      `;
    });
    featuredProductsSection.innerHTML = `<div class="grid md:grid-cols-4 gap-6">${productsHTML}</div>`;
  }

  // Newsletter Section
  const newsletterSection = document.getElementById("newsletter-section");
  if (newsletterSection) {
    newsletterSection.innerHTML = `
      <div class="max-w-6xl mx-auto px-4 py-16 text-center">
        <h2 class="text-2xl font-bold mb-4">Stay Updated with Sustainable Beauty</h2>
        <p class="text-gray-600 mb-8 max-w-2xl mx-auto">
          Get the latest updates on new sustainable products, clean beauty tips, and exclusive offers.
        </p>
        <div class="flex gap-4 max-w-md mx-auto">
          <input type="email" placeholder="Enter your email" class="flex-1 px-4 py-2 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent"/>
          <button class="bg-pink-600 text-white px-6 py-2 rounded-lg hover:bg-pink-700">Subscribe</button>
        </div>
      </div>
    `;
  }
});
