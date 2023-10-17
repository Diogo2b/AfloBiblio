# AfloBiblio

## Introduction

AfloBiblio est une application de gestion de bibliothèque qui permet aux utilisateurs de gérer des emprunts, des réservations et d'autres fonctionnalités liées à la bibliothèque.

## Prérequis

- PHP 7.4 ou supérieur
- Composer
- Symfony
- Base de données (par exemple, MySQL)

## Instructions d'installation

1. **Clonez le dépôt**  
   Clonez le dépôt Git sur votre machine locale en utilisant la commande suivante:

2. **Installez les dépendances**  
   Naviguez vers le répertoire du projet et exécutez la commande suivante pour installer les dépendances nécessaires:
   composer install

3. **Configuration de la base de données**  
   Assurez-vous de configurer votre base de données dans le fichier `.env` ou `.env.local`. Modifiez la ligne commençant par `DATABASE_URL` avec vos informations de connexion à la base de données.

4. **Créez la base de données**  
   php bin/console doctrine:database:create

5. **Exécutez les migrations**  
   Exécutez les migrations pour créer les tables nécessaires:
   php bin/console doctrine:migrations:migrate

6. **Démarrez le serveur Symfony**  
   Démarrez le serveur de développement Symfony avec la commande suivante:
   symfony server:start

## Utilisation

1. **Accédez à l'application**  
   Ouvrez votre navigateur et accédez à `https://127.0.0.1:8000` pour voir l'interface de l'application.

2. **Inscription et connexion**  
   Si vous n'avez pas encore de compte, inscrivez-vous en cliquant sur le lien d'inscription. Sinon, connectez-vous avec vos identifiants.

3. **Gestion des emprunts et des réservations**  
   Une fois connecté, vous pouvez naviguer dans l'application pour gérer les emprunts, les réservations et d'autres fonctionnalités liées à la bibliothèque.

## Conclusion

Assurez-vous de bien comprendre le fonctionnement de l'application avant de l'utiliser en production. En cas de problème ou de question, n'hésitez pas à consulter la documentation ou à contacter l'équipe de développement.
