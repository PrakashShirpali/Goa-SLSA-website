import './bootstrap';

import 'bootstrap';
import 'glightbox/dist/css/glightbox.css';  // Prefer this over minified version
import GLightbox from 'glightbox';
import './layout.js';


// Initialize GLightbox with navigation and close options
const lightbox = GLightbox({
    selector: '.glightbox',   // Make sure to select images with the 'glightbox' class
    touchNavigation: true,     // Enable swipe navigation
    loop: true,                // Enable looping through images
    zoomable: true,            // Enable zoom effect
    closeButton: true,         // Show close button
    nextButton: true,          // Show next button
    prevButton: true,          // Show previous button
    slideEffect: 'fade',       // Use fade effect for transitions
});