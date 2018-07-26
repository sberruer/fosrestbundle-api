# Projet de test de FOSRestBundle

## Création du projet

    composer create-project symfony/skeleton fosrestbundle-api
    composer require monolog
    composer require annotations
    composer require orm
    composer require profiler --dev
    composer require server --dev
    composer require maker --dev
    composer require symfony/var-dumper --dev
    composer require jms/serializer-bundle
    composer require friendsofsymfony/rest-bundle
    
Vérifier que le bundle est bien déclaré dans le fichier `config/bundles.php`

## Configuration PHP

Vérifier que le module PostgreSQL est présent dans le `php.ini`

    extension=pdo_pgsql

## Développement

### Démarrage de la base

### Configuration de la base de données
    
Modifier le fichier `doctrine.yml`

    doctrine:
        dbal:
            # configure these for your database server
            driver: 'pdo_pgsql'
            server_version: '10'
            charset: utf8
            default_table_options:
                charset: utf8
                collate: utf8_unicode_ci

Modifier le fichier `.env`

    DATABASE_URL=pgsql://postgres:admin@127.0.0.1:5432/fosrestbundle-api
    
Créer le schéma
 
    php bin/console doctrine:database:create

### Ajout des entités
    
Créer les entités

    php bin/console make:entity
    php bin/console make:migration
    php bin/console doctrine:migrations:migrate
        
### Configuration de FOS Rest

Modifier le fichier `fos_rest.yml` pour avoir :

    routing_loader:
        include_format: false

r

### Execution

    php bin/console server:run
    

