![GitHub last commit](https://img.shields.io/github/last-commit/thibaultdelgrande/sae401) ![GitHub code size in bytes](https://img.shields.io/github/languages/code-size/thibaultdelgrande/sae401) ![GitHub](https://img.shields.io/github/license/thibaultdelgrande/sae401) ![GitHub top language](https://img.shields.io/github/languages/top/thibaultdelgrande/sae401)
# SAE4D01 - Développer pour le web

## Installer le site

Le but de cette SAE est de recréer un site internet pour une agence d'escape game

### Pré-requis

1. PHP 8.1 ou supérieur (https://www.php.net/downloads.php) 
2. MySQL/MariaDB (https://www.mysql.com/fr/downloads/ | https://mariadb.org/download/), SQLite (https://www.sqlite.org/download.html) ou PostgreSQL (https://www.postgresql.org/download/)

### Installation

1. Installez Composer (https://getcomposer.org/download/) et le Symfony CLI (https://symfony.com/download)
2. Téléchargez et décompressez le projet
3. Effectuez la commande `composer install` pour installez les dépendances
4. Créez un fichier .env.local
5. Si vous utilisez MySQL ou MariaDB, placez ce code :
`DATABASE_URL="mysql://app:!ChangeMe!@127.0.0.1:3306/app?serverVersion=8&charset=utf8mb4"`
Si vous utilisez SQLite, placez ce code :
`DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"`
Si vous utilisez PostgreSQL, placez ce code :
`DATABASE_URL="postgresql://app:!ChangeMe!@127.0.0.1:5432/app?serverVersion=15&charset=utf8"`
6. Remplacez le premier `app` par le nom d'utilisateur de la base de donnée (par défaut, root). Remplacez `!ChangeMe!` par le mot de passe de la base de donnée. Changez `127.0.0.1` par l'url de votre base de donnée. Si elle est hebergée sur la même machine que le reste du site, laissez `127.0.0.1`. Si le port est différent, changez le port après `:`. Changez le deuxième `app` par le nom de la base de donnée. Elle ne doit pas exister. Remplacez `%kernel.project_dir%` par le chemin de votre projet.
7. Pour créer la base de donnée, effectuez `php bin/console doctrine:database:create`
8. Créez une migration des tables en effectuant `php bin/console make:migration`
9. Appliquez la migration `php bin/console doctrine:migrations:migrate`
10. Lancez le serveur en effectuant `symfony server:start`

### Version de développement

1. Installez l'utilitaire pour faire des fixtures `composer require orm-fixtures --dev`
2. Installez faker pour générer des faux jeux de données `composer require fakerphp/faker --dev`
3. Appliquer les fixtures `php bin/console doctrine:fixtures:load`

## Install the site

The goal of this SAE is to recreate a website for an escape game agency

### Prerequisites

1. PHP 8.1 or higher (https://www.php.net/downloads.php) 
2. MySQL/MariaDB (https://www.mysql.com/fr/downloads/ | https://mariadb.org/download/), SQLite (https://www.sqlite.org/download.html) or PostgreSQL (https://www.postgresql.org/download/)

### Installation

1. Install Composer (https://getcomposer.org/download/) and the Symfony CLI (https://symfony.com/download)
2. Download and unzip the project
3. Use the `composer install` command to install the dependencies
4. Create a .env.local file
5. If you are using MySQL or MariaDB, place this code :
Database_URL="mysql://app:!ChangeMe!@127.0.0.1:3306/app?serverVersion=8&charset=utf8mb4
If you are using SQLite, place this code :
Database_URL="sqlite:///%kernel.project_dir%/var/data.db
If you are using PostgreSQL, place this code:
`DATABASE_URL="postgresql://app:!ChangeMe!@127.0.0.1:5432/app?serverVersion=15&charset=utf8"`
6. Replace the first `app` with the database user name (by default, root). Replace `!ChangeMe!` with the database password. Change `127.0.0.1` to the url of your database. If it is hosted on the same machine as the rest of the site, leave `127.0.0.1`. If the port is different, change the port after `:`. Change the second `app` to the name of the database. It must not exist. Replace `%kernel.project_dir%` with the path to your project.
7. To create the database, run `php bin/console doctrine:database:create`.
8. Create a migration of the tables by doing `php bin/console make:migration`.
9. Apply the migration `php bin/console doctrine:migrations:migrate`
10. Start the server by doing `symfony server:start`

### Development version

1. Install the utility to make fixtures `composer require orm-fixtures --dev`
2. Install faker to generate fake datasets `composer require fakerphp/faker --dev`
3. Apply fixtures `php bin/console doctrine:fixtures:load`
