# Stage fmpf fes

## composant pour tester le projet

### xampp ou wamp

Servere et  sql et php

### git

pour des commande bash

## Installation

- lancer git et excuter `cd /c/xampp/htdocs`
- Cloner le repo  `git clone https://github.com/achrafrahouti/StageFMPF.git projet`
- acheminer `cd` a l'intereiure de repertoire
- excuter `composer install`
- excuter `cp .env.example .env`
- excuter `php artisan key:generate`
- Configurer les cordonner de base de donner dans le fichier  `.env`

DB_DATABASE=database_name
DB_USERNAME=root //user
DB_PASSWORD=     //password

- excuter `php artisan serve`
- consulter le projet __http://127.0.0.1:8000__

## Users

### Admin

is
__admin@admin.com__

### Etudiant

is
__etudiant@etudiant.com__

### Secretaire

is
__secretaire@secretaire.com__

### Encadrant

is
__encadrant@encadrant.com__

### Passwords

is
__password__
