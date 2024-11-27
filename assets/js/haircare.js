document.addEventListener('DOMContentLoaded', function() {
    // Initialize variables
    const productGrid = document.querySelector('.grid');
    const products = document.querySelectorAll('.grid > a');

    // Initialize lazy loading for images
    function initializeLazyLoading() {
        const images = document.querySelectorAll('img');
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.classList.remove('opacity-0');
                        observer.unobserve(img);
                    }
                }
            });
        });

        images.forEach(img => {
            if (img.src) {
                img.classList.add('opacity-0', 'transition-opacity', 'duration-300');
                img.dataset.src = img.src;
                img.src = 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7'; // Transparent placeholder
                imageObserver.observe(img);
            }
        });
    }

    // Add hover effects and animations to product cards
    function initializeProductCards() {
        products.forEach(product => {
            const card = product.querySelector('div');
            
            // Add hover effect
            product.addEventListener('mouseenter', () => {
                card.classList.add('shadow-md');
                card.classList.add('transform', 'scale-105');
                card.style.transition = 'all 0.3s ease';
            });
            
            product.addEventListener('mouseleave', () => {
                card.classList.remove('shadow-md');
                card.classList.remove('transform', 'scale-105');
            });

            // Add rating stars animation
            const ratingContainer = product.querySelector('.flex.items-center');
            if (ratingContainer) {
                ratingContainer.addEventListener('mouseenter', () => {
                    const star = ratingContainer.querySelector('svg');
                    if (star) {
                        star.classList.add('animate-pulse');
                    }
                });
                
                ratingContainer.addEventListener('mouseleave', () => {
                    const star = ratingContainer.querySelector('svg');
                    if (star) {
                        star.classList.remove('animate-pulse');
                    }
                });
            }
        });
    }

    // Initialize smooth scrolling
    function initializeSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const target = document.querySelector(targetId);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    }

    // Add animation when products come into view
    function initializeScrollAnimations() {
        const productObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                    productObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1
        });

        products.forEach(product => {
            product.classList.add('opacity-0', 'translate-y-4', 'transition-all', 'duration-500');
            productObserver.observe(product);
        });
    }

    // Mobile menu toggle (if needed)
    function initializeMobileMenu() {
        const mobileMenuButton = document.querySelector('[data-mobile-menu]');
        const mobileMenu = document.querySelector('[data-mobile-menu-items]');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
                mobileMenu.classList.toggle('flex');
            });
        }
    }

    // Initialize all features
    initializeLazyLoading();
    initializeProductCards();
    initializeSmoothScroll();
    initializeScrollAnimations();
    initializeMobileMenu();
});