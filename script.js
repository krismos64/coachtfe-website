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