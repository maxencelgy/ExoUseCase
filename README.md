## Description

Library API est une application REST développée en Laravel pour gérer une bibliothèque. Elle permet aux utilisateurs
de :

- Emprunter un livre si celui-ci est disponible.
- Retourner un livre pour le rendre à nouveau empruntable.
- Le projet suit les principes de la Clean Architecture, assurant une séparation claire des responsabilités et
  facilitant la testabilité, la maintenabilité, et l'évolutivité.

## Structure du projet

```
app/
├── Domain/           # Cœur de l'application
│   ├── Entities/     # Entités métier (Book)
│   ├── UseCases/     # Cas d'utilisation (BorrowBook, ReturnBook)
├── Repositories/     # Interfaces et adaptateurs pour la persistance
│   ├── BookRepositoryInterface.php
│   ├── EloquentBookRepository.php
├── Http/Controllers/ # Adaptateurs d'entrée (API REST)
routes/
├── api.php           # Définition des routes API

```

## Fonctionnalités

- Emprunter un livre : Marque un livre comme emprunté s'il est disponible.
- Retourner un livre : Rend un livre empruntable à nouveau.
- Validation des données : Vérifie que les livres existent avant de tenter une opération.
- Réponses en JSON : Fournit des messages clairs pour chaque opération.


# Installer le projet 
## Etape 1 :  Clone le projet

- git clone https://github.com/maxencelgy/ExoUseCase.git
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

### **1\. Emprunter un livre**

* **Méthode** : POST

* **URL** : /api/borrow

```json
{
    "bookId": 1
}
```

* **Réponses possibles** :

```
{ 
   "success": true,
   "message": "Book borrowed successfully.",
   "book": {
        "id": 1,
        "title": "Livre 1",
        "isBorrowed": true 
   },
}

```

```
{
    "success": false,
    "message": "Book is already borrowed.",
    "book": {
        "id": 1,
        "title": "Livre 1",
        "isBorrowed": true
    }
}
```

### **2\. Retourner un livre**

* **Méthode** : POST

* **URL** : /api/return

```json
{
    "bookId": 1
}
```

* **Réponses possibles** :

```
   {
    "success": true,
    "message": "Book returned successfully.",
    "book": {
        "id": 1,
        "title": "Livre 1",
        "isBorrowed": false
    }
}   
```
```
    {
    "success": false,
    "message": "Book was not borrowed.",
    "book": {
        "id": 1,
        "title": "Livre 1",
        "isBorrowed": false
    }
}
```
