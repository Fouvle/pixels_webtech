document.addEventListener('DOMContentLoaded', function() {
    // Initialize variables
    const productGrid = document.querySelector('.grid');
    const products = document.querySelectorAll('.grid > a');

    // Initialize lazy loading for images with fade-in effect
    function initializeLazyLoading() {
        const images = document.querySelectorAll('img');
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.classList.remove('opacity-0');
                        // Add a slight blur-out effect for skincare products
                        img.classList.add('blur-out');
                        setTimeout(() => {
                            img.classList.remove('blur-out');
                        }, 500);
                        observer.unobserve(img);
                    }
                }
            });
        });

        images.forEach(img => {
            if (img.src) {
                img.classList.add('opacity-0', 'transition-all', 'duration-500');
                img.dataset.src = img.src;
                img.src = 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';
                imageObserver.observe(img);
            }
        });
    }

    // Add skincare-specific animations and hover effects to product cards
    function initializeProductCards() {
        products.forEach(product => {
            const card = product.querySelector('div');
            
            // Add hover effects with a gentle glow for skincare products
            product.addEventListener('mouseenter', () => {
                card.classList.add('shadow-lg');
                card.classList.add('transform', 'scale-102');
                card.style.transition = 'all 0.4s ease';
                // Add a subtle blue glow effect for skincare
                card.style.boxShadow = '0 0 15px rgba(147, 197, 253, 0.3)';
            });
            
            product.addEventListener('mouseleave', () => {
                card.classList.remove('shadow-lg');
                card.classList.remove('transform', 'scale-102');
                card.style.boxShadow = '';
            });

            // Animate skincare-specific badges (e.g., "Hydrating", "Anti-aging")
            const badges = product.querySelectorAll('.badge');
            badges.forEach(badge => {
                badge.addEventListener('mouseenter', () => {
                    badge.classList.add('animate-pulse');
                });
                
                badge.addEventListener('mouseleave', () => {
                    badge.classList.remove('animate-pulse');
                });
            });
        });
    }

    // Initialize smooth scrolling with easing
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

    // Add staggered animation when products come into view
    function initializeScrollAnimations() {
        const productObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    // Add staggered delay for each product
                    setTimeout(() => {
                        entry.target.classList.add('opacity-100', 'translate-y-0');
                        productObserver.unobserve(entry.target);
                    }, index * 100); // 100ms delay between each product
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '50px'
        });

        products.forEach(product => {
            product.classList.add('opacity-0', 'translate-y-4', 'transition-all', 'duration-700');
            productObserver.observe(product);
        });
    }

    // Handle ingredients tooltip display
    function initializeIngredientTooltips() {
        const ingredientIcons = document.querySelectorAll('.ingredients-icon');
        
        ingredientIcons.forEach(icon => {
            const tooltip = icon.querySelector('.ingredients-tooltip');
            
            icon.addEventListener('mouseenter', () => {
                tooltip.classList.remove('opacity-0', 'invisible');
                tooltip.classList.add('opacity-100', 'visible');
            });
            
            icon.addEventListener('mouseleave', () => {
                tooltip.classList.add('opacity-0', 'invisible');
                tooltip.classList.remove('opacity-100', 'visible');
            });
        });
    }

    // Mobile menu functionality
    function initializeMobileMenu() {
        const mobileMenuButton = document.querySelector('[data-mobile-menu]');
        const mobileMenu = document.querySelector('[data-mobile-menu-items]');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
                mobileMenu.classList.toggle('flex');
                
                // Add slide animation for mobile menu
                if (mobileMenu.classList.contains('flex')) {
                    mobileMenu.classList.add('animate-slide-down');
                } else {
                    mobileMenu.classList.remove('animate-slide-down');
                }
            });
        }
    }

    // Handle skincare routine steps showcase
    function initializeRoutineSteps() {
        const routineSteps = document.querySelectorAll('.routine-step');
        
        routineSteps.forEach((step, index) => {
            const stepNumber = step.querySelector('.step-number');
            const stepContent = step.querySelector('.step-content');
            
            step.addEventListener('mouseenter', () => {
                stepNumber.classList.add('animate-bounce');
                stepContent.classList.add('font-medium');
            });
            
            step.addEventListener('mouseleave', () => {
                stepNumber.classList.remove('animate-bounce');
                stepContent.classList.remove('font-medium');
            });
        });
    }

    // Add custom styles for skincare page
    function addCustomStyles() {
        const styleSheet = document.createElement('style');
        styleSheet.textContent = `
            .blur-out {
                filter: blur(5px);
                transition: filter 0.5s ease-out;
            }
            
            .scale-102 {
                transform: scale(1.02);
            }
            
            .animate-slide-down {
                animation: slideDown 0.3s ease-out forwards;
            }
            
            @keyframes slideDown {
                from {
                    opacity: 0;
                    transform: translateY(-10px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .ingredients-tooltip {
                transition: all 0.3s ease;
            }
        `;
        document.head.appendChild(styleSheet);
    }

    // Initialize all features
    addCustomStyles();
    initializeLazyLoading();
    initializeProductCards();
    initializeSmoothScroll();
    initializeScrollAnimations();
    initializeIngredientTooltips();
    initializeMobileMenu();
    initializeRoutineSteps();
});