/*
=====================================================
SCRIPT.JS - ANIMATIONS SITE WEB
=====================================================
Auteur: Christophe - Freelance Full-Stack MERN
Description: Animations JavaScript pour le site CoachTFE
=====================================================
*/

// Variables globales pour les performances
let isScrolling = false;
let scrollTimeout;

/**
 * Fonction utilitaire pour créer une animation CSS personnalisée
 */
function createCustomAnimation(name, keyframes) {
    const style = document.createElement('style');
    style.textContent = `
        @keyframes ${name} {
            ${keyframes}
        }
    `;
    document.head.appendChild(style);
}

/**
 * Performance monitoring - Optionnel
 * Surveillance des performances d'animation
 */
function monitorPerformance() {
    if (!window.performance || !window.performance.now) return;
    
    let frameCount = 0;
    let lastTime = performance.now();
    
    function measureFPS() {
        frameCount++;
        const currentTime = performance.now();
        
        if (currentTime >= lastTime + 1000) {
            const fps = Math.round((frameCount * 1000) / (currentTime - lastTime));
            
            // Log des performances en mode développement
            if (fps < 30) {
                console.warn('Performances faibles détectées, FPS:', fps);
            }
            
            frameCount = 0;
            lastTime = currentTime;
        }
        
        requestAnimationFrame(measureFPS);
    }
    
    measureFPS();
}

// Initialisation des composants au chargement du DOM
document.addEventListener('DOMContentLoaded', function() {
    // Monitoring des performances en mode développement
    if (window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1') {
        monitorPerformance();
    }
    
    console.log('Site CoachTFE initialisé avec succès');
});

/*
=====================================================
MODAL SYSTÈME - Gestion des fenêtres modales
=====================================================
*/
// Mobile Menu Toggle
function toggleMobileMenu() {
    const navLinks = document.querySelector(".nav-links");
    const mobileToggle = document.querySelector(".mobile-menu-toggle");
    
    navLinks.classList.toggle("mobile-open");
    mobileToggle.classList.toggle("active");
    
    // Change aria-label based on menu state
    const isOpen = navLinks.classList.contains("mobile-open");
    mobileToggle.setAttribute("aria-label", isOpen ? "Fermer le menu" : "Ouvrir le menu");
}

// Close mobile menu when clicking on links
document.addEventListener("DOMContentLoaded", function() {
    const navLinks = document.querySelectorAll(".nav-links a");
    navLinks.forEach(link => {
        link.addEventListener("click", function() {
            const navLinksContainer = document.querySelector(".nav-links");
            const mobileToggle = document.querySelector(".mobile-menu-toggle");
            navLinksContainer.classList.remove("mobile-open");
            mobileToggle.classList.remove("active");
            mobileToggle.setAttribute("aria-label", "Ouvrir le menu");
        });
    });
});
function openModal() {
    console.log('Ouverture de la modal de réservation');
    // Logique pour ouvrir la modal de réservation
    // À implémenter selon les besoins
}

function closeModal() {
    console.log('Fermeture de la modal');
    // Logique pour fermer la modal
    // À implémenter selon les besoins
}

/*
=====================================================
ANIMATIONS AU SCROLL - Effet de révélation
=====================================================
*/
function setupScrollAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
            }
        });
    }, observerOptions);

    // Observer les éléments à animer
    const elementsToAnimate = document.querySelectorAll('.fade-in, .slide-up, .card');
    elementsToAnimate.forEach(el => observer.observe(el));
}

// Initialisation des animations au scroll
document.addEventListener('DOMContentLoaded', setupScrollAnimations);

// Cookie Consent Management

// Cookie Consent Management
document.addEventListener("DOMContentLoaded", function() {
    // Temporarily show popup on every visit for testing
    // const cookieConsent = localStorage.getItem("cookieConsent");
    // if (!cookieConsent) {
        // Show cookie popup after 1 second
        setTimeout(() => {
            document.getElementById("cookieConsent").classList.add("show");
        }, 1000);
    // }
});
// Accept all cookies
function acceptCookies() {
    const preferences = {
        essential: true,
        analytics: true,
        marketing: true,
        timestamp: new Date().toISOString()
    };
    
    localStorage.setItem("cookieConsent", JSON.stringify(preferences));
    document.getElementById("cookieConsent").classList.remove("show");
    
    // Initialize tracking scripts here if needed
    console.log("All cookies accepted");
}

// Reject non-essential cookies
function rejectCookies() {
    const preferences = {
        essential: true,
        analytics: false,
        marketing: false,
        timestamp: new Date().toISOString()
    };
    
    localStorage.setItem("cookieConsent", JSON.stringify(preferences));
    document.getElementById("cookieConsent").classList.remove("show");
    
    console.log("Non-essential cookies rejected");
}

// Open cookie settings modal
function openCookieSettings() {
    document.getElementById("cookieSettings").classList.add("show");
    
    // Load current preferences if they exist
    const savedPreferences = localStorage.getItem("cookieConsent");
    if (savedPreferences) {
        const prefs = JSON.parse(savedPreferences);
        document.getElementById("analyticsCookies").checked = prefs.analytics || false;
        document.getElementById("marketingCookies").checked = prefs.marketing || false;
    }
}

// Close cookie settings modal
function closeCookieSettings() {
    document.getElementById("cookieSettings").classList.remove("show");
}

// Save cookie preferences
function saveSettings(acceptAll = false) {
    const preferences = {
        essential: true,
        analytics: acceptAll || document.getElementById("analyticsCookies").checked,
        marketing: acceptAll || document.getElementById("marketingCookies").checked,
        timestamp: new Date().toISOString()
    };
    
    localStorage.setItem("cookieConsent", JSON.stringify(preferences));
    document.getElementById("cookieConsent").classList.remove("show");
    document.getElementById("cookieSettings").classList.remove("show");
    
    console.log("Cookie preferences saved:", preferences);
    
    // Initialize or remove tracking scripts based on preferences
    if (preferences.analytics) {
        // Initialize analytics (Google Analytics, etc.)
        console.log("Analytics cookies enabled");
    }
    
    if (preferences.marketing) {
        // Initialize marketing cookies (Facebook Pixel, etc.)
        console.log("Marketing cookies enabled");
    }
}

// Close modal when clicking outside
document.addEventListener("click", function(event) {
    const settingsModal = document.getElementById("cookieSettings");
    if (event.target === settingsModal) {
        closeCookieSettings();
    }
});
