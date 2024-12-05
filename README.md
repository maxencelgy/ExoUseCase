Atelier Pratique J1 : Adaptateurs et Interfaces d’Entrée/Sortie

Objectif de l’exercice

• Mettre en œuvre un adaptateur d’entrée et un adaptateur de sortie dans une architecture Clean
Architecture.

• Manipuler les couches pour séparer les responsabilités et maintenir un découplage propre.

## Etape 1 :  Clone le projet
- git clone <URL_DU_REPOSITORY>
- cd library-api

## Etape 2 :  Installer les dépendances
- composer install

## Etape 3 :  Configurer l'environement
- Créer un fichier .env à la racine du projet
- Copier le contenu du fichier .env.example dans le fichier .env

## Etape 4 :  Créer la base de données sur localhost mysql

## Etape 5 : Migrer les tables

- php artisan migrate
- php artisan db:seed --class=BookSeeder

## Etape 6 :  Lancer le serveur
- php artisan serve

## Etape 7 :  Tester l'API
http://127.0.0.1:8000/api/borrow

methode POST

json à envoyer :
```
{
"bookId": 1
}

```


Si le livre a été emprunté avec succès :
```
{
"success": true,
"message": "Book emprunté avec succès.",
"bookTitle": "Clean Architecture"
}
```
Si le livre est déjà emprunté :

```
{
"success": false,
"message": "Book déjà pris.",
"bookTitle": "Clean Architecture"
}
