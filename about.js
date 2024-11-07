document.addEventListener("DOMContentLoaded", () => {
    // Data for the content
    const heroTitle = "About Sustanify";
    const heroDescription = "Your trusted companion in making conscious beauty choices. We empower women to make informed decisions about their cosmetics and skincare products.";
  
    const mission = {
      title: "Our Mission",
      description: "We believe that beauty shouldn't come at the cost of our planet. Our mission is to transform the beauty industry by making sustainable product choices accessible, understandable, and rewarding for everyone."
    };
  
    const features = [
      {
        icon: `<svg class="w-8 h-8 text-pink-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 4c-2.021 0-4.115.633-6.03 1.704-1.939 1.093-3.679 2.635-5.025 4.479-.968 1.156-1.945 2.429-2.79 3.777C-.204 13.337.746 16.59 3.123 19.016c2.328 2.428 5.577 3.032 8.707 2.404 1.868-.431 3.479-1.514 4.744-3.029 1.207-1.48 2.235-3.184 2.968-5.027C22.597 10.376 23.168 7.263 21.7 5.234 20.231 3.205 17.868 4 15.847 5.713c-.106.101-.212.208-.318.314C13.897 6.743 12.974 4 12 4z"/></svg>`,
        title: "Sustainability Tracking",
        description: "We meticulously evaluate beauty products across multiple sustainability criteria including ingredient sourcing, packaging materials, and manufacturing processes.",
        criteria: [
          "Ingredient sourcing and environmental impact",
          "Packaging materials and recyclability",
          "Manufacturing processes",
          "Water consumption",
          "Carbon footprint"
        ]
      },
      // Add more feature data here as needed
    ];
  
    const commitment = [
      "Data-driven and objective",
      "Regularly updated",
      "Transparent in methodology",
      "Independently verified"
    ];
  
    const footerQuote = "Beauty that cares for you and the planet.";
  
    // Set Hero Section Content
    document.getElementById("hero-title").textContent = heroTitle;
    document.getElementById("hero-description").textContent = heroDescription;
  
    // Set Mission Section Content
    const missionSection = document.getElementById("mission-section");
    missionSection.innerHTML = `
      <div class="bg-white shadow-lg hover:shadow-pink-100">
        <div class="p-6">
          <h2 class="text-2xl font-semibold text-pink-900 mb-4">${mission.title}</h2>
          <p class="text-pink-700">${mission.description}</p>
        </div>
      </div>
    `;
  
    // Set Features Section Content
    const featuresSection = document.getElementById("features-section");
    let featuresHTML = '';
    features.forEach(feature => {
      featuresHTML += `
        <div class="bg-white hover:shadow-xl transition-shadow duration-300">
          <div class="p-6">
            <div class="flex items-center mb-4">
              ${feature.icon}
              <h3 class="text-xl font-semibold ml-3 text-pink-900">${feature.title}</h3>
            </div>
            <p class="text-pink-700 mb-4">${feature.description}</p>
            <ul class="space-y-2">
              ${feature.criteria.map(criterion => `
                <li class="flex items-center text-pink-600">
                  <svg class="w-4 h-4 text-pink-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M9 3L4 8h5V3zM9 3l5 5H9z"/></svg>${criterion}
                </li>
              `).join('')}
            </ul>
          </div>
        </div>
      `;
    });
    featuresSection.innerHTML = featuresHTML;
  
    // Set Commitment Section Content
    const commitmentSection = document.getElementById("commitment-section");
    commitmentSection.innerHTML = `
      <div class="bg-gradient-to-r from-pink-50 to-white">
        <div class="p-6">
          <h2 class="text-2xl font-semibold text-pink-900 mb-4">Our Commitment</h2>
          <p class="text-pink-700 mb-4">We maintain strict standards for product and brand evaluation, ensuring that our sustainability assessments are:</p>
          <ul class="grid md:grid-cols-2 gap-4">
            ${commitment.map(item => `
              <li class="flex items-center text-pink-600">
                <svg class="w-4 h-4 text-pink-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M9 3L4 8h5V3zM9 3l5 5H9z"/></svg>${item}
              </li>
            `).join('')}
          </ul>
        </div>
      </div>
    `;
  
    // Set Footer Quote Content
    document.getElementById("footer-quote").textContent = footerQuote;
  });