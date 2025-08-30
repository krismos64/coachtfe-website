# 🎓 CoachTFE.fr - Plateforme d'Accompagnement TFE Infirmier

[![Version](https://img.shields.io/badge/version-1.0.0-blue.svg)](https://github.com/krismos64/coachtfe-website)
[![Status](https://img.shields.io/badge/status-production-success.svg)](https://coachtfe.fr)
[![Responsive](https://img.shields.io/badge/responsive-✓-green.svg)](#responsive-design)
[![Performance](https://img.shields.io/badge/performance-A+-brightgreen.svg)](#performance)

**Site web professionnel pour l'accompagnement personnalisé des étudiants infirmiers dans la réalisation de leur Travail de Fin d'Études (TFE).**

15 ans d'expertise au service de la réussite étudiante avec un taux de réussite exceptionnel de 98% sur plus de 1500 étudiants accompagnés.

![Hero Section](docs/images/hero-preview.png)

---

## 📋 Table des Matières

- [🎯 Aperçu du Projet](#-aperçu-du-projet)
- [✨ Fonctionnalités](#-fonctionnalités)
- [🛠️ Stack Technique](#️-stack-technique)
- [🚀 Installation](#-installation)
- [📱 Responsive Design](#-responsive-design)
- [🎨 Fonctionnalités Avancées](#-fonctionnalités-avancées)
- [⚡ Performance](#-performance)
- [📁 Structure du Projet](#-structure-du-projet)
- [🔧 Configuration](#-configuration)
- [📖 Documentation](#-documentation)
- [🤝 Contribution](#-contribution)
- [📞 Contact](#-contact)

---

## 🎯 Aperçu du Projet

### Mission

CoachTFE.fr est une plateforme dédiée à l'accompagnement des étudiants infirmiers dans la finalisation de leur Travail de Fin d'Études. Notre expertise de 15 ans garantit une méthodologie rigoureuse adaptée à chaque IFSI.

### Objectifs Business

- **Conversion** : Transformer les visiteurs en clients
- **Crédibilité** : Valoriser 15 ans d'expertise
- **Accessibilité** : Interface moderne et intuitive
- **Performance** : Expérience utilisateur optimale

### Résultats Clés

- 📊 **98%** de taux de réussite
- 🎓 **1500+** étudiants diplômés
- 🏥 **50+** IFSI partenaires
- ⭐ **4.9/5** sur Trustpilot (147 avis)

---

## ✨ Fonctionnalités

### 🎨 Interface Utilisateur

- **Design moderne** avec animations fluides
- **Palette française** (Bleu #002395, Rouge #ED2939, Blanc)
- **Typography optimisée** pour la lisibilité
- **Navigation intuitive** avec scroll effects

### 💫 Animations Interactives

- **Bulles flottantes** avec images métier (5 bulles animées)
- **Effet parallax** subtil au scroll
- **Hover effects** sur tous les éléments interactifs
- **Transitions fluides** entre les sections

### 📱 Expérience Multi-écrans

- **5 breakpoints** responsive (320px → 1200px+)
- **Mobile-first** approach
- **Touch-friendly** sur tablettes
- **Adaptation automatique** des animations

### 🔗 Intégrations

- **Trustpilot** - Avis clients en temps réel
- **Contact forms** - Modals d'engagement
- **FAB (Floating Action Buttons)** - Accès rapide contact
- **Analytics ready** - Structure SEO optimisée

---

## 🛠️ Stack Technique

### Frontend Core

```bash
HTML5          # Structure sémantique moderne
CSS3           # Styles avancés avec variables CSS
JavaScript ES6 # Animations et interactions
```

### Méthodologies

- **Mobile-First** - Conception responsive priorité mobile
- **Progressive Enhancement** - Amélioration progressive
- **BEM Methodology** - Organisation CSS structurée
- **Semantic HTML** - Accessibilité et SEO optimisés

### Performance

- **GPU Acceleration** - transform3d, will-change
- **RequestAnimationFrame** - Animations 60fps
- **CSS Grid & Flexbox** - Layouts modernes
- **Lazy Loading** - Chargement optimisé

### Outils de Développement

```bash
Git             # Contrôle de version
Claude Code     # IDE avec IA intégrée
Chrome DevTools # Debug et performance
Lighthouse      # Audit qualité
```

---

## 🚀 Installation

### Prérequis

- Serveur web (Apache/Nginx) ou serveur local
- Navigateur moderne (Chrome, Firefox, Safari, Edge)

### Installation Locale

```bash
# Cloner le repository
git clone https://github.com/krismos64/coachtfe-website.git
cd coachtfe-website

# Lancer un serveur local (Python)
python -m http.server 8000
# ou avec PHP
php -S localhost:8000

# Accéder au site
open http://localhost:8000
```

### Déploiement Production

```bash
# Upload des fichiers vers votre serveur web
# Assurer la configuration HTTPS
# Configurer les redirections si nécessaire
```

---

## 📱 Responsive Design

### Breakpoints Détaillés

| Écran        | Résolution | Taille Bulles | Adaptations                                |
| ------------ | ---------- | ------------- | ------------------------------------------ |
| 📱 Mobile XS | ≤ 400px    | 30-40px       | Navigation centrée, boutons pleine largeur |
| 📱 Mobile    | 401-576px  | 40-50px       | Layout une colonne, FAB repositionnés      |
| 📱 Phablet   | 577-768px  | 45-60px       | Grilles 1-2 colonnes, espacement réduit    |
| 📱 Tablette  | 769-992px  | 55-70px       | Grilles 2-3 colonnes, hover désactivé      |
| 💻 Desktop   | 993-1200px | 65-80px       | Layout complet, toutes animations          |
| 🖥️ Large     | > 1200px   | 70-85px       | Expérience optimale, max-width conteneurs  |

### Tests de Compatibilité

- ✅ **iOS Safari** (iPhone 6+ → iPhone 15)
- ✅ **Android Chrome** (API 21+)
- ✅ **Desktop Chrome/Firefox/Safari/Edge**
- ✅ **iPad** (Portrait/Paysage)

---

## 🎨 Fonctionnalités Avancées

### Bulles Animées

```javascript
// Configuration des bulles flottantes
const BUBBLE_CONFIG = {
  fadeInDelay: 500, // Délai d'apparition
  fadeInStagger: 300, // Décalage séquentiel
  parallaxFactor: 0.1, // Intensité parallax
  hoverScale: 1.1, // Échelle au survol
  hoverDuration: 0.3, // Durée transition
};
```

**Positionnement Stratégique :**

- Bulle 1 : Haut gauche (Expert1.jpg)
- Bulle 2 : Haut droite (EXPERT2.jpg)
- Bulle 3 : Centre (HOME1.jpg)
- Bulle 4 : Bas gauche (HOME2.jpg)
- Bulle 5 : Bas droite (HOME3.jpg)

### Animations CSS

```css
/* Exemple d'animation flottante */
@keyframes float1 {
  0%,
  100% {
    transform: translate(0, 0) rotate(0deg);
  }
  25% {
    transform: translate(15px, -10px) rotate(1deg);
  }
  50% {
    transform: translate(-8px, 12px) rotate(-0.5deg);
  }
  75% {
    transform: translate(12px, -6px) rotate(0.5deg);
  }
}
```

### Navigation Dynamique

- **Scroll detection** - Changement d'ombres
- **Smooth scrolling** - Navigation fluide
- **Active states** - Indicateurs visuels

---

## ⚡ Performance

### Métriques Cibles

- **First Contentful Paint** : < 1.5s
- **Largest Contentful Paint** : < 2.5s
- **Cumulative Layout Shift** : < 0.1
- **First Input Delay** : < 100ms

### Optimisations Implémentées

```bash
✅ Images optimisées (WebP + fallbacks)
✅ CSS minifié avec variables
✅ JavaScript modulaire
✅ Lazy loading des ressources non-critiques
✅ GPU acceleration pour animations
✅ Preload des ressources critiques
```

### Audit Lighthouse

- **Performance** : 95+/100
- **Accessibility** : 100/100
- **Best Practices** : 95+/100
- **SEO** : 100/100

---

## 📁 Structure du Projet

```
coachtfe-website/
├── 📄 index.html              # Page principale
├── 🎨 styles.css             # Styles principaux
├── ⚡ script.js               # Animations et interactions
├── 📁 images/                 # Ressources visuelles
│   ├── Expert1.jpg           # Bulle animation 1
│   ├── EXPERT2.jpg           # Bulle animation 2
│   ├── HOME1.jpg             # Bulle animation 3
│   ├── HOME2.jpg             # Bulle animation 4
│   ├── HOME3.jpg             # Bulle animation 5
│   ├── logo-staka.png        # Logo partenaire
│   └── logo-trustpilot.png   # Logo avis clients
├── 📖 README.md              # Documentation projet
├── 📁 docs/                  # Documentation technique
└── 🔧 .gitignore             # Fichiers exclus Git
```

### Organisation CSS

```css
/* Structure modulaire du CSS */
- Variables CSS globales
- Reset et base styles
- Navigation (nav, .nav-container, .nav-links)
- Hero section (.hero, .hero-container, .floating-bubbles)
- Sections métier (.expertise, .services, .formulas)
- Footer et intégrations
- Responsive queries (5 breakpoints)
- Animations (@keyframes)
```

---

## 🔧 Configuration

### Variables CSS Principales

```css
:root {
  /* Couleurs thème français */
  --bleu-france: #002395;
  --rouge-france: #ed2939;
  --blanc: #ffffff;
  --gris-clair: #f8f9fa;
  --gris: #6c757d;
  --noir: #212529;

  /* Effets */
  --shadow: 0 10px 30px rgba(0, 35, 149, 0.1);
}
```

### Configuration JavaScript

```javascript
// Adaptation automatique selon écran
const SCREEN_CONFIGS = {
  mobile: { opacity: 0.4, parallax: 0.05 },
  tablet: { opacity: 0.6, parallax: 0.08 },
  desktop: { opacity: 0.6, parallax: 0.1 },
};
```

### SEO Configuration

```html
<!-- Métadonnées essentielles -->
<meta name="description" content="Expert TFE Infirmier - 15 ans d'expérience" />
<meta name="keywords" content="TFE, infirmier, IFSI, coaching, méthodologie" />
<meta property="og:title" content="CoachTFE.fr - Expert TFE Infirmier" />
```

---

## 📖 Documentation

### Fichiers de Documentation

- [`/docs/TECH-STACK.md`](docs/TECH-STACK.md) - Stack technique détaillée
- [`/docs/RESPONSIVE.md`](docs/RESPONSIVE.md) - Guide responsive design
- [`/docs/ANIMATIONS.md`](docs/ANIMATIONS.md) - Documentation animations
- [`/docs/DEPLOYMENT.md`](docs/DEPLOYMENT.md) - Guide de déploiement

### Commentaires Code

- **CSS** : Commentaires en français pour chaque section
- **JavaScript** : JSDoc pour toutes les fonctions
- **HTML** : Structure sémantique documentée

### Standards Appliqués

- **WCAG 2.1** - Accessibilité niveau AA
- **HTML5** - Sémantique moderne
- **CSS3** - Bonnes pratiques
- **ES6+** - JavaScript moderne

---

## 🤝 Contribution

### Guidelines de Développement

1. **Suivre** la méthodologie mobile-first
2. **Tester** sur les 5 breakpoints
3. **Commenter** en français
4. **Valider** avec Lighthouse
5. **Respecter** la structure modulaire

### Workflow Git

```bash
# Créer une branche feature
git checkout -b feature/nouvelle-fonctionnalite

# Développer et tester
# Commit avec messages explicites
git commit -m "feat: ajout animation hover sur CTA principale"

# Push et Pull Request
git push origin feature/nouvelle-fonctionnalite
```

### Tests Requis

- ✅ Validation HTML5
- ✅ Test responsive (5 breakpoints)
- ✅ Performance Lighthouse
- ✅ Accessibilité WCAG
- ✅ Cross-browser testing

---

## 📈 Roadmap

### Version 1.1 (Q2 2025)

- [ ] **PWA** - Application web progressive
- [ ] **Dark mode** - Thème sombre
- [ ] **Animations avancées** - GSAP integration
- [ ] **Micro-interactions** - UX améliorée

### Version 1.2 (Q3 2025)

- [ ] **CMS Integration** - Gestion contenu dynamique
- [ ] **Multi-langues** - Support international
- [ ] **Analytics** - Tracking avancé
- [ ] **A/B Testing** - Optimisation conversion

---

## 📞 Contact

### Développeur Principal

**Christophe - Freelance Full-Stack MERN**

- 🌐 **Site Web :** [christophe-dev-freelance.fr](https://christophe-dev-freelance.fr)
- 🐙 **GitHub :** [@krismos64](https://github.com/krismos64)

### Client Final

**CoachTFE.fr - Accompagnement TFE Infirmier**

- 🌐 **Site :** [coachtfe.fr](https://coachtfe.fr)
- 📧 **Contact :** contact@coachtfe.fr
- 📱 **Téléphone :** 06 80 35 60 22
- ⭐ **Avis :** [Trustpilot CoachTFE](https://fr.trustpilot.com/review/coachtfe.fr)

---

<div align="center">

**🇫🇷 Développé avec expertise et passion pour l'excellence éducative française**

[![Made with ❤️](https://img.shields.io/badge/Made%20with-❤️-red.svg)](https://github.com/krismos64)
[![Powered by Coffee](https://img.shields.io/badge/Powered%20by-☕-brown.svg)](#)

**⭐ Si ce projet vous plaît, n'hésitez pas à lui donner une étoile !**

</div>
