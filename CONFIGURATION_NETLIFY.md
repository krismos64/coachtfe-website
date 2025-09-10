# Configuration Netlify Forms pour CoachTFE.fr

## 📧 Configuration des notifications email

Pour recevoir les soumissions du formulaire d'entretien gratuit sur **c.mostefaoui@yahoo.fr**, suivez ces étapes :

### 1. Accéder au Dashboard Netlify
1. Connectez-vous à [app.netlify.com](https://app.netlify.com)
2. Sélectionnez le site CoachTFE

### 2. Configurer les notifications de formulaire
1. Allez dans **Site settings** (Paramètres du site)
2. Dans le menu latéral, cliquez sur **Forms** 
3. Cliquez sur **Form notifications**

### 3. Ajouter une notification email
1. Cliquez sur **Add notification** > **Email notification**
2. Configurez comme suit :
   - **Event to listen for** : New form submission
   - **Form** : entretien-gratuit (le nom du formulaire)
   - **Email to notify** : c.mostefaoui@yahoo.fr
   - **Email subject** : Nouvelle demande d'entretien gratuit - CoachTFE
3. Cliquez sur **Save**

### 4. Template d'email personnalisé (optionnel)
Vous pouvez personnaliser le template d'email dans les paramètres. Voici un exemple :

```
Nouvelle demande d'entretien gratuit reçue !

Nom : {{fullName}}
Email : {{email}}
Téléphone : {{phone}}
Urgence : {{urgency}}

Description du projet :
{{projectDescription}}

---
Date de soumission : {{created_at}}
```

## 🔧 Formulaire configuré

Le formulaire utilise les attributs Netlify suivants :
- `data-netlify="true"` : Active Netlify Forms
- `netlify-honeypot="bot-field"` : Protection anti-spam
- `name="entretien-gratuit"` : Nom du formulaire dans Netlify

## 📊 Voir les soumissions

Les soumissions sont visibles dans :
- **Dashboard Netlify** > **Forms** > **Active forms** > **entretien-gratuit**
- Vous pouvez télécharger les soumissions en CSV
- Les notifications email sont envoyées instantanément

## ✅ Vérification après déploiement

1. Après le déploiement, vérifiez que le formulaire apparaît dans **Forms** > **Active forms**
2. Faites un test de soumission
3. Vérifiez la réception de l'email sur c.mostefaoui@yahoo.fr
4. Si l'email n'arrive pas, vérifiez les spams

## 🚨 Important

- Le formulaire ne fonctionnera qu'après déploiement sur Netlify
- En local, le formulaire affichera une erreur (c'est normal)
- Les soumissions sont stockées sur Netlify pendant 3 mois (plan gratuit)
- Limite : 100 soumissions/mois sur le plan gratuit Netlify

## 📝 Notes supplémentaires

- Page de confirmation : `/merci-entretien.html`
- Protection anti-spam : honeypot field intégré
- Les données sont sécurisées via HTTPS
- Conformité RGPD : les données restent sur les serveurs Netlify