# 💼  Jobboar

Une application web pour gérer les offres d'emploi, développée avec Laravel.  

## 🛠️ Fonctionnalités  

- Création et gestion des offres d'emploi.  
- Recherche et filtrage avancés des offres.  
- Authentification pour employeurs et candidats.  
- Tableau de bord dédié pour chaque utilisateur.  
- **Backoffice administrateur** pour gérer la base de données MySQL.  

---  

## 💻 Technologies Utilisées  

- **Langage :** PHP 8.2  
- **Framework :** Laravel ^11.9  
- **Base de données :** MySQL  
- **Frontend :** Tailwind CSS, JavaScript  
- **Outils :** Vite.js pour le bundling, Composer et NPM pour la gestion des dépendances  

---  

## 🚀 Installation  

1. **Cloner le dépôt** :  
   ```bash
   git clone <url-du-dépôt>
   cd <nom-du-dossier>

2. **Lancer le serveur de développement** :
   ```bash
   php artian serve

## 📚 Documentation Technique  

### 🏗️ Architecture du Projet  

Le projet est construit sur le framework **Laravel**, qui suit le modèle **MVC (Modèle-Vue-Contrôleur)**. Voici les principaux composants :  

- **📂 Modèles** : situés dans `app/Models`, ils représentent les entités de la base de données.  
- **🎨 Vues** : les templates Blade sont dans `resources/views` pour l'affichage côté client.  
- **🧠 Contrôleurs** : dans `app/Http/Controllers`, ils gèrent la logique métier et les requêtes HTTP.  

---

### 🗄️ Base de Données  

- **🛢️ SGBD** : MySQL est utilisé pour stocker les données.  
- **📜 Migrations** : gérées via Laravel pour créer les tables et les relations (`database/migrations`).  
- **🛠️ Usines et Seeders** : pour générer des données fictives lors du développement (`database/factories` et `database/seeders`).  

---

### 🛡️ Backoffice Administrateur  

Le **Backoffice** permet à l'administrateur de :  

- 🔑 Gérer les utilisateurs : activation, suspension, suppression.  
- 📝 Gérer les offres d'emploi : création, modification, suppression.  
- 📊 Visualiser les statistiques : nombre d'utilisateurs, offres actives, etc.  

---

### 🔒 Authentification et Sécurité  

- **🔑 Système d'authentification** : fourni par Laravel avec des guards et providers personnalisés.  
- **🚦 Middleware** : pour protéger les routes et gérer les permissions.  
- **✅ Validation des données** : utilisation des form requests pour valider les entrées utilisateur.  

---

### 🖥️ Interfaces Utilisateur  

- **🎨 Front-end** : construit avec Tailwind CSS pour un design réactif et moderne.  
- **🔄 Composants Réutilisables** : utilisation de Blade components pour une maintenance facilitée.  
- **⚡ Scripts JavaScript** : interactions dynamiques avec Alpine.js.  

---

### 📦 Gestion des Dépendances  

- **⚙️ Composer** : pour les packages PHP.  
- **📦 NPM** : pour les packages JavaScript et outils front-end.  
- **🌟 Packages clés** :  
  - `laravel/ui` : pour les scaffolds d'authentification.  
  - `tailwindcss` : pour le style.  
  - `vite` : pour le bundling et le hot reloading.  

---

### 🔧 Commandes Artisan Personnalisées  

Des commandes artisan peuvent être créées pour automatiser certaines tâches :  

- **🧹 Nettoyage** : `php artisan app:cleanup` pour nettoyer les fichiers temporaires.  
- **📊 Rapports** : `php artisan report:generate` pour générer des rapports périodiques.  

---

### 🧪 Tests et Qualité  

- **🛠️ Tests Unitaires** : écrits avec PHPUnit (`tests/Unit`).  
- **🔍 Tests Fonctionnels** : pour vérifier les flux utilisateur (`tests/Feature`).  
- **📏 Linting** : utilisation de PHP_CodeSniffer pour assurer la conformité du code.  

---

### ⚙️ Environnement et Configuration  

- **📄 Fichier `.env`** : contient les variables d'environnement sensibles.  
- **🗂️ Configuration** : tous les fichiers de configuration sont dans `config/`.  
- **🚀 Cache** : mise en cache des configurations et routes pour améliorer les performances.  

---

### 🚢 Déploiement  

- **🔧 Préparation** :  
  - Configurer les variables d'environnement en production.  
  - Générer les clés et certificats nécessaires.  

- **📜 Commandes à exécuter** :  
  ```bash
  php artisan migrate --force
  php artisan config:cache
  php artisan route:cache


