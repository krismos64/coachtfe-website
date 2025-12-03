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
- [🔒 Conformité RGPD](#-conformité-rgpd)
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

## 🚀 Installation

### Prérequis

- Serveur web (Apache/Nginx) ou serveur local
- Navigateur moderne (Chrome, Firefox, Safari, Edge)

### Installation Locale

```bash
# Cloner le repository
git clone https://github.com/krismos64/coachtfe-website.git
cd /Users/chris/Documents/sites/coachtfe-website

# Lancer un serveur local (Python)
python -m http.server 8000
# ou avec PHP
php -S localhost:8000

# Accéder au site
open http://localhost:8000
```

### Déploiement Production

Le site est déployé sur OVH via FileZilla :

```bash
# Hébergement : OVH
# Méthode de déploiement : FTP via FileZilla
# URL de production : https://coachtfe.fr

# Processus de déploiement :
# 1. Se connecter au serveur OVH via FileZilla
# 2. Transférer les fichiers modifiés vers le répertoire web
# 3. Vérifier le site en production sur https://coachtfe.fr
```

### ⚠️ Notes importantes pour le déploiement OVH

**Favicon** : Des fichiers favicon sont placés à la racine pour compatibilité OVH :

- `favicon.ico` - Favicon principal
- `favicon-16x16.png` - Version 16px
- `favicon-32x32.png` - Version 32px

Ces fichiers doivent être uploadés à la racine du serveur pour assurer l'affichage correct du favicon en production.

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
├── 🎨 styles.min.css         # Styles principaux
├── ⚡ script.js               # Animations et interactions
├── 📄 mentions-legales.html   # Page mentions légales
├── 🔧 .htaccess              # Config Apache (cache, GZIP, sécurité, RGPD)
├── 📁 images/                 # Ressources visuelles
│   ├── Expert1.jpg           # Bulle animation 1
│   ├── EXPERT2.jpg           # Bulle animation 2
│   ├── HOME1.jpg             # Bulle animation 3
│   ├── HOME2.jpg             # Bulle animation 4
│   ├── HOME3.jpg             # Bulle animation 5
│   ├── logo-coachtfe.png     # Logo principal
│   ├── logo-staka.png        # Logo partenaire
│   ├── logo-trustpilot.png   # Logo avis clients
│   ├── livre.png             # Image livre guide TFE
│   └── favicon/              # Icônes site originales
│       ├── icons8-entraîneur--color-16.png
│       ├── icons8-entraîneur--color-32.png
│       └── icons8-entraîneur--color-96.png
├── 🌐 favicon.ico            # Favicon racine (OVH)
├── 🌐 favicon-16x16.png      # Favicon 16px (OVH)
├── 🌐 favicon-32x32.png      # Favicon 32px (OVH)
├── 📖 README.md              # Documentation projet
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

## 🔒 Conformité RGPD

### Certification & Conformité

Le site CoachTFE.fr respecte pleinement le **Règlement Général sur la Protection des Données (RGPD)** et la directive **ePrivacy** européenne.

| Critère réglementaire | Statut | Détails |
|----------------------|--------|---------|
| Consentement préalable | ✅ Conforme | Aucun cookie non-essentiel avant consentement |
| Option de refus | ✅ Conforme | Bouton "Refuser" visible et accessible |
| Granularité du choix | ✅ Conforme | Paramétrage par catégorie de cookies |
| Registre des consentements | ✅ Conforme | Stockage sécurisé des preuves |
| Retrait du consentement | ✅ Conforme | Modification possible à tout moment |

### Solution Technique Implémentée

**Consentmanager CMP** (Consent Management Platform)

```html
<!-- Script CMP certifié - Chargé en premier dans le <head> -->
<script type="text/javascript" data-cmp-ab="1"
  src="https://cdn.consentmanager.net/delivery/autoblocking/012a0429f209b.js"
  data-cmp-host="a.delivery.consentmanager.net"
  data-cmp-cdn="cdn.consentmanager.net"
  data-cmp-codesrc="0">
</script>
```

### Fonctionnalités RGPD

| Fonctionnalité | Description |
|----------------|-------------|
| **Autoblocking** | Bloque automatiquement tous les scripts tiers (Analytics, Trustpilot, etc.) jusqu'au consentement |
| **TCF 2.2** | Certification IAB Transparency & Consent Framework v2.2 |
| **Bannière personnalisable** | Interface adaptable aux couleurs du site |
| **Multi-langues** | Support français natif |
| **Preuve de consentement** | Enregistrement horodaté pour justification CNIL |

### Scripts Gérés par la CMP

Les scripts suivants sont **automatiquement bloqués** jusqu'au consentement utilisateur :

- **Google Analytics** (G-9BCKWKBVDN) - Cookies analytiques
- **Trustpilot** - Cookies tiers avis clients
- Tout autre script tiers ajouté ultérieurement

### Politique de Cookies

| Catégorie | Finalité | Consentement requis |
|-----------|----------|---------------------|
| **Essentiels** | Fonctionnement du site | Non (légitimes) |
| **Analytiques** | Mesure d'audience | Oui |
| **Marketing** | Personnalisation contenu | Oui |

### Configuration Serveur (.htaccess)

Le fichier `.htaccess` est optimisé pour **OVH mutualisé** et inclut des headers de sécurité conformes RGPD :

```apache
# Headers RGPD compatibles OVH
Header always set Permissions-Policy "geolocation=(), microphone=(), camera=(), payment=(), usb=()"
Header always set Cross-Origin-Opener-Policy "same-origin-allow-popups"
Header always set Cross-Origin-Resource-Policy "cross-origin"
Header always set Strict-Transport-Security "max-age=31536000; includeSubDomains"
```

| Header | Protection |
|--------|------------|
| **Permissions-Policy** | Bloque géolocalisation, micro, caméra, paiement, USB |
| **HSTS** | Force HTTPS pendant 1 an |
| **X-Frame-Options** | Protection clickjacking |
| **Content-Security-Policy** | Whitelist des domaines autorisés |
| **Cross-Origin policies** | Isolation des ressources |

### Fonctionnalités .htaccess

- ✅ Compression GZIP
- ✅ Mise en cache (images, CSS, JS, fonts)
- ✅ Redirection HTTPS forcée
- ✅ Redirection www vers non-www
- ✅ Headers de sécurité OWASP
- ✅ Headers RGPD

### Mise à Jour : 27 Novembre 2025

- ✅ Intégration Consentmanager CMP certifiée
- ✅ Suppression de l'ancien système cookies maison
- ✅ Google Analytics conditionné au consentement
- ✅ Autoblocking activé pour tous les scripts tiers
- ✅ Headers RGPD dans .htaccess compatible OVH mutualisé

---

## 📈 Roadmap

### Version 1.0.1 (Complété)

- [x] **Favicon** - Correction compatibilité OVH avec fichiers à la racine
- [x] **SEO** - Optimisation des balises meta et chemins absolus
- [x] **Documentation** - Mise à jour README avec notes de déploiement
- [x] **Git** - Ajout .gitignore et nettoyage du repository

### Version 1.0.2 (Complété - 3 Décembre 2025) - Anti-plagiat Google Ads

**Contexte** : Modifications demandées suite à problème de plagiat détecté par Google Ads.

#### Modifications de contenu

- [x] `Analyses des Résultats` → `Accompagnement dans le traitement de vos résultats`
- [x] `Finalisation du TFE` → `Relecture de votre TFE avec recommandations`

#### Modifications SEO / Meta tags

- [x] **Title** : `Accompagnement Méthodologique TFE Infirmier | Guidance & Anti-Plagiat`
- [x] **Meta description** : `Accompagnement méthodologique pour votre TFE infirmier. Guidance par des formateurs experts, outils anti-plagiat et méthodologie validée.`
- [x] **Keywords** : `accompagnement TFE infirmier, méthodologie TFE, guidance mémoire infirmier, anti-plagiat TFE, coaching méthodologique IFSI`
- [x] **Open Graph title** : `CoachTFE - Accompagnement Méthodologique TFE Infirmier`
- [x] **Open Graph description** : `Des formateurs experts vous guident dans la méthodologie de VOTRE TFE. Accompagnement personnalisé avec contrôle anti-plagiat systématique.`
- [x] **Twitter Cards** : Mises à jour avec les mêmes valeurs

#### Schema.org ajouté

- [x] **EducationalOrganization** : Nouveau schema JSON-LD (lignes 115-137)

```json
{
  "@context": "https://schema.org",
  "@type": "EducationalOrganization",
  "name": "CoachTFE.fr",
  "description": "Accompagnement méthodologique pour TFE infirmier avec contrôle anti-plagiat systématique",
  "url": "https://coachtfe.fr",
  "serviceType": [
    "Accompagnement méthodologique TFE",
    "Guidance recherche infirmière",
    "Coaching anti-plagiat"
  ],
  "areaServed": "FR",
  "educationalCredentialAwarded": "TFE Infirmier",
  "teaches": [
    "Méthodologie de recherche infirmière",
    "Analyse qualitative et quantitative",
    "Normes de citation académique",
    "Prévention du plagiat"
  ]
}
```

#### Commits associés

| Commit | Description |
|--------|-------------|
| `a55526a` | fix(content): modification textes roadmap |
| `337282a` | seo(meta): mise à jour title, description, keywords |
| `ca0f42a` | seo(og): mise à jour Open Graph et Twitter Cards |
| `209c078` | seo(schema): ajout EducationalOrganization JSON-LD |

✅ **Déployé en production le 3 décembre 2025**

---

## 📞 Contact

### Développeur Principal

**Christophe - Freelance Full-Stack MERN**

- 🌐 **Site Web :** [christophe-dev-freelance.fr](https://christophe-dev-freelance.fr)
- 🐙 **GitHub :** [@krismos64](https://github.com/krismos64)

</div>
