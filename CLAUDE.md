# CLAUDE.md - Instructions sp�cifiques au projet CoachTFE.fr

## =� Contexte du projet
**Site vitrine pour CoachTFE.fr** - Plateforme d'accompagnement TFE infirmier avec 15 ans d'expertise.
- **Client** : CoachTFE.fr by Staka
- **Type** : Site web statique avec animations interactives
- **Stack** : HTML5, CSS3, JavaScript ES6 (vanilla)
- **�tat** : Production active sur https://coachtfe.fr

## <� Objectifs prioritaires
1. **Conversion** : Maximiser les demandes d'entretien gratuit
2. **Performance** : Temps de chargement < 2s
3. **SEO** : Score Lighthouse > 95/100
4. **Responsive** : Parfait sur tous devices (5 breakpoints)
5. **Animations** : Bulles flottantes fluides � 60fps

## � Points d'attention critiques

### Ne JAMAIS modifier :
- Les couleurs du th�me fran�ais (#002395 bleu, #ED2939 rouge)
- Les textes de garantie (98% r�ussite, 1500+ �tudiants)
- La structure SEO existante
- Les donn�es structur�es JSON-LD

### Toujours v�rifier :
- Performance des animations sur mobile
- Compatibilit� cross-browser (Safari iOS inclus)
- Accessibilit� WCAG 2.1 niveau AA
- Optimisation images (WebP avec fallback)

## =� Conventions de code

### CSS
```css
/* Utiliser les variables CSS existantes */
--bleu-france: #002395;
--rouge-france: #ED2939;

/* Classes BEM */
.block__element--modifier

/* Animations GPU-optimis�es */
transform: translate3d();
will-change: transform;
```

### JavaScript
```javascript
// Pas de jQuery - Vanilla JS uniquement
// RequestAnimationFrame pour animations
// Event delegation pour performance
// Throttle/debounce sur scroll/resize
```

### HTML
```html
<!-- Structure s�mantique obligatoire -->
<main>, <section>, <article>, <nav>
<!-- Attributs ARIA si n�cessaire -->
<!-- Images avec loading="lazy" -->
```

## =� Structure des fichiers

```
/images/
  - Expert1.jpg, EXPERT2.jpg � Bulles anim�es experts
  - HOME1.jpg, HOME2.jpg, HOME3.jpg � Bulles anim�es �tudiants
  - logo-*.png � Logos partenaires
  - favicon/ � Ic�nes site

/styles.min.css � Styles uniques du site (fichier principal)
/script.js � Animations et interactions
```

## =� Workflow de d�veloppement

### Avant toute modification :
1. V�rifier les performances actuelles avec Lighthouse
2. Tester sur mobile r�el (pas juste DevTools)
3. Sauvegarder l'�tat actuel

### Apr�s modification :
1. Tester les 5 breakpoints (320px, 576px, 768px, 992px, 1200px)
2. Valider HTML W3C
3. V�rifier console JavaScript (0 erreur)
4. Re-tester Lighthouse (doit rester > 90)

## <� Animations sp�cifiques

### Bulles flottantes
- **5 bulles** positionn�es strat�giquement
- Animation `float` unique par bulle
- Parallax au scroll (factor: 0.1)
- Hover scale (1.1) avec transition
- Adaptation responsive des tailles

### Performances requises
```javascript
// Configuration responsive
mobile: { opacity: 0.4, size: 30-40px }
tablet: { opacity: 0.6, size: 55-70px }
desktop: { opacity: 0.6, size: 70-85px }
```

## =� KPIs � maintenir

- **Taux de conversion** : CTA principal > 5%
- **Bounce rate** : < 40%
- **Time to Interactive** : < 2.5s
- **Cumulative Layout Shift** : < 0.1

## = SEO obligatoire

### � chaque modification de contenu :
- Meta title unique (60 car max)
- Meta description (155 car max)
- Open Graph complet
- Schema.org � jour
- Sitemap.xml si nouvelles pages

## = Bugs connus / TODO

### Actuellement fonctionnel :
-  Toutes les animations
-  Formulaires de contact
-  Navigation responsive
-  Int�gration Trustpilot

### Am�liorations futures sugg�r�es :
- [ ] Progressive Web App (PWA)
- [ ] Dark mode optionnel
- [ ] Lazy loading avanc� des images
- [ ] Compression Brotli c�t� serveur

## =� Commandes utiles

```bash
# Serveur local de test
python3 -m http.server 8000

# Minifier CSS si modifi�
# Utiliser un outil comme cssnano ou clean-css

# V�rifier les liens morts
# Utiliser un crawler comme linkchecker
```

## =� Contacts projet

- **Dev** : Christophe (christophe-dev-freelance.fr)
- **Client** : 06 80 35 60 22
- **Prod** : https://coachtfe.fr

## � R�gles Claude Code

1. **Toujours** analyser l'impact sur les performances avant modification
2. **Ne jamais** casser le responsive ou les animations existantes
3. **Privil�gier** l'optimisation � l'ajout de features
4. **Documenter** chaque changement significatif
5. **Tester** sur vrais devices, pas seulement �mulateurs

---

=� **Note importante** : Ce site est en production active avec du trafic r�el. Toute modification doit �tre test�e minutieusement avant d�ploiement. Les animations de bulles sont un �l�ment signature du site - les pr�server est critique.