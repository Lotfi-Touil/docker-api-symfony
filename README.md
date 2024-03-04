# Projet Docker SkyTowers Explorer

Bienvenue sur le projet Docker SkyTowers Explorer! Ce projet est une application web développée pour afficher les tours les plus hautes du monde, fournir une interface pour gérer des tâches (todos) et exposer une API pour récupérer ces tâches au format JSON.

## Fonctionnalités

- **Affichage des tours les plus hautes du monde :** Accédez à une liste visuelle des tours les plus imposantes de notre planète.
- **Gestion de tâches (Todos) :** Interface utilisateur pour ajouter, visualiser, et gérer vos tâches quotidiennes.
- **API Todos :** Accédez à vos tâches au format JSON via `/api/todos`, permettant l'intégration avec d'autres applications ou services.

## Prérequis

Avant de démarrer, assurez-vous d'avoir Docker et Docker Compose installés sur votre machine. 
Ce projet utilise `docker-compose` pour orchestrer les différents services nécessaires à l'application.

## Installation et démarrage

1. **Cloner le dépôt :** Commencez par cloner ce dépôt sur votre machine locale.
2. **Lancer les services :** Ouvrez un terminal à la racine du projet cloné et exécutez la commande suivante :

```bash
docker-compose up --build
```

Cette commande construit et démarre les conteneurs nécessaires pour l'application : une base de données PostgreSQL, un service web Symfony pour l'application principale, Composer pour gérer les dépendances PHP, et Adminer pour gérer la base de données via une interface web.

3. **Accéder à l'application :** Une fois les services démarrés, vous pouvez accéder à l'application web à l'adresse suivante : [http://localhost:8000](http://localhost:8000). Pour interagir avec la base de données via Adminer, rendez-vous sur [http://localhost:8080](http://localhost:8080).

## Utilisation

- **Page principale :** La page d'accueil affiche les tours les plus hautes du monde.
- **Gestion des Todos :** Accédez à `/todo` pour ajouter et gérer vos tâches.
- **API Todos :** Pour récupérer vos tâches au format JSON, utilisez l'URL `/api/todos`.

## Auteurs

- **Moussa Annaël**
- **Touil Lotfi**
- **Cavanne Antonin**

Nous espérons que ce projet vous sera utile. Pour toute question ou suggestion, n'hésitez pas à contribuer ou à nous contacter.

---

Bonne exploration des tours les plus hautes du monde avec SkyTowers Explorer!