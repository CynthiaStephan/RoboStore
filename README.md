# RotoStore - Création d'une boutique en ligne en Symfony

## **Description du Projet**

Dans un futur pas si lointain, **Rebecca Kline** a révolutionné le monde avec une gamme de robots allant des assistants personnels aux robots industriels ultra-performants. **RoboStore** est une boutique en ligne fictive permettant aux utilisateurs de :  
- Parcourir un catalogue de robots.  
- Consulter des fiches produits détaillées.  
- Ajouter des robots au panier pour une éventuelle commande.

---

![Screen de la page d'accueil du projet](./docs/Screen-robostore.jpg)

## **Objectifs du Projet**

- Développer une boutique en ligne simple avec Symfony.  
- Appliquer les principes de conception orientée objet, notamment SOLID.  
- Organiser le projet en architecture MVC.  
- Utiliser Twig pour le rendu des vues et MySQL pour la persistance des données.  


## **Fonctionnalités Ciblées**

### 1. **Catalogue de Robots**
- Affichage d’une liste paginée de robots avec :  
  - Nom, image, prix et description courte.

### 2. **Fiches Produits**
- Détail de chaque robot avec :  
  - Nom, description complète, prix et image.

### 3. **Système de Panier**
- Ajouter des robots au panier.  
- Consulter les robots sélectionnés.  


## **Technologies Utilisées**

- **PHP** : Backend.
- **CSS** : Mise en page 
- **Symfony** : Framework pour structurer l’application.  
- **Twig** : Moteur de templates pour les vues.  
- **MySQL** : Base de données relationnelle.  
- **Composer** : Gestionnaire de dépendances.  
- **Docker** : Configuration et déploiement de l’environnement de développement.  

---

## **Guide de Lancement du Projet**

### **Étapes d’Installation**

1. **Construction des Images Docker**  
   Exécutez la commande suivante pour construire des images fraîches :  
   ```bash
   docker compose build --no-cache
   ```

2. **Lancement des Conteneurs**  
   Démarrez les conteneurs Docker et configurez automatiquement un projet Symfony :  
   ```bash
   docker compose up --pull always -d --wait
   ```

3. **Accès à l’Application**  
   Ouvrez votre navigateur et rendez-vous sur :  
   [https://localhost](https://localhost).  

4. **Arrêt des Conteneurs**  
   Une fois terminé, vous pouvez arrêter et supprimer les conteneurs avec :  
   ```bash
   docker compose down --remove-orphans
   ```
## Credits
Projet construit en utilisant la base [Docker Symfony](https://github.com/dunglas/symfony-docker) <br>

Created by [Kévin Dunglas](https://dunglas.dev), co-maintained by [Maxime Helias](https://twitter.com/maxhelias) and sponsored by [Les-Tilleuls.coop](https://les-tilleuls.coop).