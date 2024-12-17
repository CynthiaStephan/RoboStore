## Description du Projet

Dans un futur pas si lointain, ~~Elon Musk~~ Marc Raibert a lancé une gamme de robots révolutionnaires, allant des assistants personnels aux robots industriels ultra performants. **RoboStore** est une boutique en ligne fictive qui permet à ses utilisateurs d’explorer le catalogue de ces robots, de consulter leurs fiches détaillées, et (en bonus) de les ajouter à leur panier pour une potentielle commande.

---

## Fonctionnalités Ciblées

### Catalogue de Robots :

- Une liste paginée des robots disponibles à l'achat.
- Présentation des robots avec leur nom, image, prix et une courte description.

### Fiches Produits :

- Une page dédiée à chaque robot avec une description détaillée, son prix, et son image.

### (Bonus) Système de Panier :

- Ajout des robots au panier.
- Consultation des robots sélectionnés.

---

## Tâches à Réaliser

### 1. Initialisation du Projet

- Copier la configuration de base pour le projet Symfony depuis le projet que nous avons initialisé avec Symfony Docker.
- Mettre en place l’environnement de développement avec Docker.
- Vérifier que le conteneur fonctionne correctement (serveur web et base de données).

### 2. Modélisation de la Base de Données

Créer les entités suivantes avec les relations spécifiées dans le schéma ci-dessous :

- **User**
- **Robot**
- **Category**
- **Cart**
- **CartItem**

### 3. Mise en place du Catalogue

Créer un contrôleur `RobotController` pour :

- Afficher une liste paginée des robots disponibles dans le catalogue.
- Ajouter une vue Twig pour le catalogue (`templates/robot/index.html.twig`).

### 4. Création des Fiches Produit

Ajouter une route et une méthode dans `RobotController` pour :

- Afficher une fiche produit détaillée pour un robot donné.
- Créer une vue Twig pour les fiches produits (`templates/robot/show.html.twig`).

### 5. Bonus : Système de Panier

Créer un contrôleur `CartController` pour :

- Ajouter un robot au panier.
- Afficher le contenu du panier.

---

## Schéma de la Base de Données

### 1. Entité : User

| Champ    | Type     | Relation | Description                          |
|----------|----------|----------|--------------------------------------|
| id       | integer  | -        | Identifiant unique                   |
| email    | string   | -        | Adresse email de l'utilisateur       |
| password | string   | -        | Mot de passe                         |
| cart     | OneToOne | avec Cart| Le panier associé                    |

---

### 2. Entité : Robot

| Champ      | Type     | Relation        | Description                    |
|------------|----------|-----------------|--------------------------------|
| id         | integer  | -               | Identifiant unique             |
| name       | string   | -               | Nom du robot                   |
| description| text     | -               | Description du robot           |
| price      | decimal  | -               | Prix du robot                  |
| image      | string   | -               | URL de l'image                 |
| category   | ManyToOne| avec Category   | Catégorie du robot             |

---

### 3. Entité : Category

| Champ      | Type     | Relation      | Description                        |
|------------|----------|---------------|------------------------------------|
| id         | integer  | -             | Identifiant unique                 |
| name       | string   | -             | Nom de la catégorie                |
| robots     | OneToMany| avec Robot    | Robots de cette catégorie          |

---

### 4. Entité : Cart

| Champ    | Type     | Relation       | Description                         |
|----------|----------|----------------|-------------------------------------|
| id       | integer  | -              | Identifiant unique                  |
| user     | OneToOne | avec User      | L'utilisateur propriétaire          |
| items    | OneToMany| avec CartItem  | Les articles du panier              |

---

### 5. Entité : CartItem

| Champ     | Type     | Relation     | Description                             |
|-----------|----------|--------------|-----------------------------------------|
| id        | integer  | -            | Identifiant unique                      |
| cart      | ManyToOne| avec Cart    | Le panier auquel appartient l'article   |
| robot     | ManyToOne| avec Robot   | Le robot ajouté au panier               |
| quantity  | integer  | -            | Quantité de robots                      |
