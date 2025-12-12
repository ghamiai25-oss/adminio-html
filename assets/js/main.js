/**
 * Ascend Theme - Main JavaScript
 * 
 * @package Ascend
 */

(function() {
    'use strict';

    /**
     * Get design token value
     * 
     * @param {string} token - Token name
     * @returns {string} Token value
     */
    function getToken(token) {
        const tokens = {
            'color-primary': '#0066cc',
            'color-primary-dark': '#0052a3',
            'color-secondary': '#6b5b95',
            'color-accent': '#ff6b6b',
            'color-neutral-100': '#fafafa',
            'color-neutral-200': '#f0f0f0',
            'color-neutral-300': '#e0e0e0',
            'color-neutral-500': '#7a7a7a',
            'color-neutral-700': '#333333',
            'color-neutral-900': '#0a0a0a',
            'color-success': '#1a9d6f',
            'color-warning': '#f0ad4e',
            'color-error': '#d9534f',
            'space-xs': '0.25rem',
            'space-sm': '0.5rem',
            'space-md': '1rem',
            'space-lg': '1.5rem',
            'space-xl': '2rem',
            'space-2xl': '3rem',
            'space-3xl': '4rem',
            'space-4xl': '6rem',
            'font-size-xs': '0.75rem',
            'font-size-sm': '0.875rem',
            'font-size-base': '1rem',
            'font-size-lg': '1.125rem',
            'font-size-xl': '1.25rem',
            'font-size-2xl': '1.5rem',
            'font-size-3xl': '1.875rem',
            'font-size-4xl': '2.25rem',
            'font-size-5xl': '3rem',
            'radius-sm': '0.25rem',
            'radius-md': '0.375rem',
            'radius-lg': '0.5rem',
            'radius-xl': '1rem',
        };

        return tokens[token] || '';
    }

    /**
     * Initialize accessibility features
     */
    function initAccessibility() {
        // Handle focus visible state
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Tab') {
                document.body.classList.add('keyboard-nav');
            }
        });

        document.addEventListener('mousedown', function() {
            document.body.classList.remove('keyboard-nav');
        });
    }

    /**
     * Initialize navigation menu
     */
    function initNavigation() {
        const navMenus = document.querySelectorAll('.primary-menu, .secondary-menu');

        navMenus.forEach(function(menu) {
            const menuItems = menu.querySelectorAll('li.menu-item-has-children > a');

            menuItems.forEach(function(item) {
                item.addEventListener('click', function(e) {
                    // Prevent default behavior on touchscreen devices
                    if (window.matchMedia('(hover: none)').matches) {
                        e.preventDefault();
                        item.parentElement.classList.toggle('active');
                    }
                });
            });
        });
    }

    /**
     * Initialize smooth scroll behavior
     */
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                
                // Skip if it's just a hash
                if (href === '#') {
                    return;
                }

                const target = document.querySelector(href);
                if (!target) {
                    return;
                }

                e.preventDefault();
                
                const offsetTop = target.offsetTop - 100;
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth',
                });
            });
        });
    }

    /**
     * Initialize intersection observer for animations
     */
    function initIntersectionObserver() {
        if (!window.IntersectionObserver) {
            return;
        }

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in-view');
                }
            });
        }, {
            threshold: 0.1,
        });

        document.querySelectorAll('[data-animate]').forEach(function(el) {
            observer.observe(el);
        });
    }

    /**
     * DOM Ready
     */
    function domReady(callback) {
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', callback);
        } else {
            callback();
        }
    }

    /**
     * Initialize all features
     */
    function init() {
        initAccessibility();
        initNavigation();
        initSmoothScroll();
        initIntersectionObserver();
    }

    /**
     * Run initialization when DOM is ready
     */
    domReady(init);

    // Export global utility functions
    window.Ascend = {
        getToken: getToken,
    };

})();
