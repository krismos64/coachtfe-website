/*
=====================================================
SCRIPT.JS - ANIMATIONS BULLES FLOTTANTES
=====================================================
Auteur: Christophe - Freelance Full-Stack MERN
Description: Animations JavaScript pour les bulles 
flottantes de la section hero
=====================================================
*/

// Configuration des bulles animées
const BUBBLE_CONFIG = {
    fadeInDelay: 500,           // Délai avant l'apparition des bulles (ms)
    fadeInStagger: 300,         // Décalage entre chaque bulle (ms)
    parallaxFactor: 0.1,        // Intensité de l'effet parallax
    hoverScale: 1.1,            // Échelle au survol
    hoverDuration: 0.3          // Durée de la transition de survol
};

// Variables globales
let bubbles = [];
let isScrolling = false;
let scrollTimeout;

/**
 * Initialisation des bulles animées
 * Démarre l'animation d'apparition et configure les événements
 */
function initFloatingBubles() {
    // Récupération de tous les éléments bulles
    bubbles = document.querySelectorAll('.bubble');
    
    if (bubbles.length === 0) {
        console.log('Aucune bulle trouvée dans le DOM');
        return;
    }

    console.log(`Initialisation de ${bubbles.length} bulles animées`);

    // Animation d'apparition séquentielle des bulles
    animateBubblesAppearance();

    // Configuration des événements de scroll pour le parallax
    setupScrollParallax();

    // Configuration des événements de survol
    setupHoverEffects();

    // Adaptation automatique selon la taille d'écran
    adaptToScreenSize();

    // Redimensionnement de fenêtre
    setupResizeHandler();
}

/**
 * Animation d'apparition progressive des bulles
 */
function animateBubblesAppearance() {
    // Détermination de l'opacité selon la taille d'écran
    const screenWidth = window.innerWidth;
    let targetOpacity = 0.6; // Valeur par défaut
    
    if (screenWidth <= 400) {
        targetOpacity = 0.4;
    } else if (screenWidth <= 576) {
        targetOpacity = 0.5;
    } else if (screenWidth <= 768) {
        targetOpacity = 0.55;
    }

    bubbles.forEach((bubble, index) => {
        // Délai progressif pour chaque bulle
        const delay = BUBBLE_CONFIG.fadeInDelay + (index * BUBBLE_CONFIG.fadeInStagger);
        
        setTimeout(() => {
            bubble.style.opacity = targetOpacity;
            bubble.style.transform = 'scale(0.8)';
            bubble.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
            
            // Animation de croissance
            setTimeout(() => {
                bubble.style.transform = 'scale(1)';
            }, 100);
            
        }, delay);
    });
}

/**
 * Configuration de l'effet parallax au scroll
 */
function setupScrollParallax() {
    // Utilisation de requestAnimationFrame pour des performances optimales
    function handleScroll() {
        if (!isScrolling) {
            requestAnimationFrame(updateParallax);
            isScrolling = true;
        }

        // Arrêt de l'animation après un délai
        clearTimeout(scrollTimeout);
        scrollTimeout = setTimeout(() => {
            isScrolling = false;
        }, 100);
    }

    function updateParallax() {
        const scrollY = window.pageYOffset;
        const heroSection = document.querySelector('.hero');
        
        if (!heroSection) return;

        const heroRect = heroSection.getBoundingClientRect();
        const heroVisible = heroRect.bottom > 0 && heroRect.top < window.innerHeight;

        if (!heroVisible) {
            isScrolling = false;
            return;
        }

        // Application de l'effet parallax à chaque bulle
        bubbles.forEach((bubble, index) => {
            // Vitesse différente pour chaque bulle
            const speed = BUBBLE_CONFIG.parallaxFactor * (1 + index * 0.1);
            const yPos = scrollY * speed;
            
            // Application de la transformation avec optimisation GPU
            bubble.style.transform = `translate3d(0, ${yPos}px, 0)`;
        });
    }

    // Écouteur d'événement de scroll avec throttling
    window.addEventListener('scroll', handleScroll, { passive: true });
}

/**
 * Adaptation automatique selon la taille d'écran
 */
function adaptToScreenSize() {
    const screenWidth = window.innerWidth;
    let opacityLevel, animationSpeed, parallaxIntensity;

    // Définition des paramètres selon la taille d'écran
    if (screenWidth <= 400) {
        // Très petits mobiles
        opacityLevel = 0.4;
        animationSpeed = 'slow';
        parallaxIntensity = 0.05;
        BUBBLE_CONFIG.parallaxFactor = 0.05;
    } else if (screenWidth <= 576) {
        // Mobiles standard
        opacityLevel = 0.5;
        animationSpeed = 'medium';
        parallaxIntensity = 0.07;
        BUBBLE_CONFIG.parallaxFactor = 0.07;
    } else if (screenWidth <= 768) {
        // Grandes mobiles/Phablets
        opacityLevel = 0.55;
        animationSpeed = 'medium';
        parallaxIntensity = 0.08;
        BUBBLE_CONFIG.parallaxFactor = 0.08;
    } else if (screenWidth <= 992) {
        // Tablettes
        opacityLevel = 0.6;
        animationSpeed = 'normal';
        parallaxIntensity = 0.1;
        BUBBLE_CONFIG.parallaxFactor = 0.1;
    } else {
        // Desktop
        opacityLevel = 0.6;
        animationSpeed = 'normal';
        parallaxIntensity = 0.1;
        BUBBLE_CONFIG.parallaxFactor = 0.1;
    }

    // Application des paramètres aux bulles
    bubbles.forEach((bubble) => {
        // Ajustement de l'opacité de base
        if (bubble.style.opacity === '' || bubble.style.opacity === '0') {
            // La bulle n'est pas encore apparue, on garde l'animation d'apparition
        } else {
            bubble.style.opacity = opacityLevel;
        }

        // Ajustement de la vitesse d'animation selon l'écran
        if (animationSpeed === 'slow') {
            // Ralentir les animations sur mobile
            const currentDuration = bubble.style.animationDuration || '30s';
            const newDuration = `${parseInt(currentDuration) + 10}s`;
            bubble.style.animationDuration = newDuration;
        }
    });

    console.log(`Adaptation écran: ${screenWidth}px - Opacité: ${opacityLevel} - Parallax: ${parallaxIntensity}`);
}

/**
 * Configuration des effets de survol
 */
function setupHoverEffects() {
    bubbles.forEach(bubble => {
        // Survol - agrandissement subtil
        bubble.addEventListener('mouseenter', () => {
            bubble.style.transition = `transform ${BUBBLE_CONFIG.hoverDuration}s ease`;
            bubble.style.transform = `scale(${BUBBLE_CONFIG.hoverScale})`;
            bubble.style.opacity = '0.8';
            bubble.style.zIndex = '10';
        });

        // Fin du survol - retour à la normale
        bubble.addEventListener('mouseleave', () => {
            bubble.style.transition = `transform ${BUBBLE_CONFIG.hoverDuration}s ease`;
            bubble.style.transform = 'scale(1)';
            bubble.style.opacity = '0.6';
            bubble.style.zIndex = '1';
        });
    });
}

/**
 * Gestion du redimensionnement de fenêtre
 */
function setupResizeHandler() {
    let resizeTimeout;
    
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(() => {
            // Réadapter automatiquement les bulles selon la nouvelle taille
            adaptToScreenSize();
            
            // S'assurer que les bulles restent visibles sur tous les écrans
            bubbles.forEach(bubble => {
                bubble.style.display = 'block';
            });
        }, 250);
    });
}

/**
 * Animation de pulsation pour attirer l'attention
 * Utilisée occasionnellement sur certaines bulles
 */
function addPulseEffect(bubbleIndex, duration = 2000) {
    if (bubbleIndex >= bubbles.length) return;
    
    const bubble = bubbles[bubbleIndex];
    bubble.style.animation += `, pulse ${duration}ms ease-in-out`;
    
    setTimeout(() => {
        // Suppression de l'effet pulse après la durée
        bubble.style.animation = bubble.style.animation.replace(/, pulse \d+ms ease-in-out/, '');
    }, duration);
}

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

// Ajout de l'animation pulse personnalisée
createCustomAnimation('pulse', `
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
`);

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
            
            // Si les FPS sont trop bas, réduire les animations
            if (fps < 30) {
                console.warn('Performances faibles détectées, réduction des animations');
                bubbles.forEach(bubble => {
                    bubble.style.animationDuration = '40s'; // Ralentir les animations
                });
            }
            
            frameCount = 0;
            lastTime = currentTime;
        }
        
        requestAnimationFrame(measureFPS);
    }
    
    requestAnimationFrame(measureFPS);
}

// Initialisation au chargement du DOM
document.addEventListener('DOMContentLoaded', () => {
    console.log('Initialisation des bulles flottantes...');
    
    // Délai pour laisser le temps au CSS de se charger
    setTimeout(initFloatingBubles, 100);
    
    // Monitoring des performances en mode développement
    if (window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1') {
        monitorPerformance();
    }
});

// Nettoyage lors du déchargement de la page
window.addEventListener('beforeunload', () => {
    // Suppression des écouteurs d'événements
    bubbles.forEach(bubble => {
        bubble.removeEventListener('mouseenter', () => {});
        bubble.removeEventListener('mouseleave', () => {});
    });
});

// Export pour utilisation externe si nécessaire
window.BubbleAnimations = {
    init: initFloatingBubles,
    addPulse: addPulseEffect,
    config: BUBBLE_CONFIG
};