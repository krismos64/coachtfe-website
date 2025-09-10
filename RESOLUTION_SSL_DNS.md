# 🔧 Résolution du problème SSL/DNS - CoachTFE.fr

## ❌ Erreur actuelle : `ERR_SSL_PROTOCOL_ERROR`

Cette erreur indique un conflit entre la configuration DNS sur Hostinger et l'hébergement sur Netlify.

## ✅ Solution complète étape par étape

### 📋 Étape 1 : Configuration DNS sur Hostinger

1. **Connectez-vous à votre compte Hostinger**
2. Allez dans **Domaines** > **coachtfe.fr** > **DNS/Nameservers**
3. **SUPPRIMEZ tous les enregistrements existants** (surtout les A et AAAA)
4. **Ajoutez ces enregistrements DNS :**

#### Pour utiliser avec Netlify (RECOMMANDÉ) :

**Option A - Avec sous-domaine www (Recommandé)**
```
Type: CNAME
Nom: www
Valeur: [votre-site].netlify.app
TTL: 3600

Type: A
Nom: @ (ou vide)
Valeur: 75.2.60.5
TTL: 3600
```

**Option B - Domaine apex uniquement**
```
Type: A
Nom: @ (ou vide)
Valeur: 75.2.60.5
TTL: 3600

Type: CNAME
Nom: www
Valeur: [votre-site].netlify.app
TTL: 3600
```

### 📋 Étape 2 : Configuration sur Netlify

1. **Dans Netlify Dashboard**
2. Allez dans **Domain settings**
3. Cliquez sur **Add custom domain**
4. Ajoutez :
   - `coachtfe.fr`
   - `www.coachtfe.fr`
5. Netlify va automatiquement :
   - Provisionner un certificat SSL Let's Encrypt
   - Configurer HTTPS

### 📋 Étape 3 : Vérification SSL

1. **Attendez 24-48h** pour la propagation DNS complète
2. Dans Netlify, vérifiez :
   - **Domain settings** > **HTTPS**
   - Le statut doit être : "Your site has HTTPS enabled"
3. Si le SSL n'est pas actif :
   - Cliquez sur **Verify DNS configuration**
   - Puis **Provision certificate**

## 🚨 Points importants

### ⚠️ Ne PAS faire :
- ❌ N'activez PAS le SSL sur Hostinger
- ❌ N'utilisez PAS Cloudflare en plus
- ❌ Ne gardez PAS d'enregistrements A pointant vers Hostinger

### ✅ À faire :
- ✅ Laissez Netlify gérer le SSL (gratuit avec Let's Encrypt)
- ✅ Utilisez uniquement les DNS d'Hostinger pour pointer vers Netlify
- ✅ Attendez la propagation complète (jusqu'à 48h)

## 🔍 Vérification de la configuration

### Commandes pour vérifier la propagation DNS :
```bash
# Vérifier les enregistrements DNS
nslookup coachtfe.fr
dig coachtfe.fr

# Vérifier le certificat SSL
openssl s_client -connect coachtfe.fr:443 -servername coachtfe.fr
```

### Sites de vérification en ligne :
- [whatsmydns.net](https://www.whatsmydns.net) - Vérifier la propagation DNS
- [sslshopper.com/ssl-checker](https://www.sslshopper.com/ssl-checker.html) - Vérifier le SSL

## 🔄 Si le problème persiste

### Option 1 : Utiliser les nameservers de Netlify
1. Dans Hostinger, changez les nameservers pour :
   ```
   dns1.p01.nsone.net
   dns2.p01.nsone.net
   dns3.p01.nsone.net
   dns4.p01.nsone.net
   ```
2. Gérez tout depuis Netlify DNS

### Option 2 : Forcer le renouvellement SSL
1. Dans Netlify > Domain settings > HTTPS
2. Cliquez sur **Renew certificate**
3. Ou supprimez et rajoutez le domaine

## 📞 Support

- **Support Netlify** : support@netlify.com
- **Forum Netlify** : answers.netlify.com
- **Support Hostinger** : Via leur chat en ligne

## ⏱️ Délais attendus

- Propagation DNS : 15 min à 48h (généralement 2-4h)
- Provisionnement SSL Netlify : 5-15 minutes après DNS correct
- Cache navigateur : Videz le cache ou testez en navigation privée

## 💡 Solution temporaire

En attendant la résolution :
- Utilisez l'URL Netlify : `https://[votre-site].netlify.app`
- Elle fonctionne immédiatement avec HTTPS