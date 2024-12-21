# 🌍 Wiki Management System - Gestionnaire de Contenu avec Front Office

## 🚀 Présentation du Projet
Le **Wiki Management System** est une plateforme conçue pour offrir une gestion efficace des catégories, des tags et des wikis, tout en proposant une interface front office intuitive. Ce projet vise à permettre aux administrateurs et auteurs de collaborer pour organiser, créer et partager du contenu de manière simple et fluide. 

L'objectif principal est de faire un endroit où tout le monde peut travailler ensemble, créer, trouver et partager des wikis de manière facile et intéressante.

---

## 📋 Fonctionnalités Principales

### 🎛 Back Office
- **Gestion des Catégories (Admin) :**
  - Création, modification et suppression de catégories.
  - Association de plusieurs wikis à une catégorie.

- **Gestion des Tags (Admin) :**
  - Création, modification et suppression de tags.
  - Association des tags aux wikis pour faciliter la navigation.

- **Gestion des Wikis :**
  - Les auteurs peuvent créer, modifier et supprimer leurs propres wikis.
  - Les administrateurs peuvent archiver les wikis inappropriés.
  - Association d'une catégorie et de plusieurs tags par wiki.

- **Inscription des Auteurs :**
  - Inscription des auteurs avec nom, e-mail et mot de passe sécurisé.

- **Page d'Accueil du Tableau de Bord :**
  - Consultation des statistiques des entités via un tableau de bord interactif.

---

### 🖥 Front Office
- **Authentification :**
  - Enregistrement et connexion des utilisateurs.
  - Redirection des administrateurs vers le tableau de bord et des utilisateurs normaux vers la page d'accueil.

- **Barre de Recherche :**
  - Recherche dynamique (AJAX) pour wikis, catégories et tags.

- **Affichage Dynamique :**
  - Derniers wikis ajoutés.
  - Dernières catégories créées ou mises à jour.

- **Page Détail des Wikis :**
  - Accès aux informations détaillées d'un wiki, y compris contenu, tags, catégories et auteur.

---

## 🔧 Technologies Utilisées

### Frontend
- **Technologies :** HTML5, CSS Framework, JavaScript
- **AJAX :** Recherche dynamique sans rechargement de page.

### Backend
- **Langage :** PHP 8
- **Architecture :** MVC (Modèle-Vue-Contrôleur)
- **Base de Données :** MySQL avec le pilote PDO

## 🚀 Instructions d'Installation
### Prérequis
- PHP 8.0+ avec extension PDO activée.
- MySQL 5.7+.
- Gestionnaire de dépendances Composer.

### Étapes
1. **Cloner le Repository :**
   ```bash
   https://github.com/CHERKAOUIfatimazahra/Wiki-.git
