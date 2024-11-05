# Nicomak MerciApp
Application remerciement entre employe

Fonctionnalités:
- possible de créer un compte
- Connexion
- Publier un message de remerciement
- Afficher les messages de remerciement avec leur auteur, date publication et destination

## Prérequis
- PHP 8.1
- Composer
- MySQL

### Installation
1.  Cloner le projet
2.  Lancer la commande suivante dans le dossier du projet
```bash
composer install
```
3.  Créer un fichier .env à la racine du projet avec les variables d'environnement suivantes
```bash
DATABASE_URL=mysql://useranme:password@127.0.0.1:3306/nicomak_app
``` 
4.  Lancer la commande suivante dans le dossier du projet
```bash
php bin/console doctrine:database:create
```
5.  Lancer la commande suivante pour démarrer le serveur web
```bash
php bin/console server:run
``` 

