## Table of Contents
1. [General Info](#general-info)
2. [Technologies](#technologies)
3. [Installation](#installation)
4. [Collaboration](#collaboration)
5. [FAQs](#faqs)
### Information du projet
***
Le projet s'appelle veille.io, il s'agit d'un blog codé en PHP, comme tout blog, nous pouvons s'inscrire, se connecter, créer, supprimer un article, y répondre... J'ai utilisé bootstrap pour le styliser.
## Les technologies
***
Les technologies utilisées pour le projet:
* [PHP](https://www.php.net/docs.php): Version 8.0.13 
* [Symfony](https://symfony.com/doc/5.4/index.html): Version 5.1.11
* [BOOTSTRAP](https://getbootstrap.com/docs/5.2/getting-started/introduction/): Version 5.2
## Installation
***
Comment installer l'eCommerce Symfony
```
$ git clone https://github.com/WassimSss/Blog-poo
$ composer install
$ composer update
$ composer dump-autoload
  Modifier la variable DATABASE_URL en fonction des informations de votre base de données
$ php bin/console doctrine:database:create
$ php bin/console doctrine:schema:update --dump-sql
$ php bin/console doctrine:schema:update --force
  Remplir la base de données avec de fausses informations
$ php bin/console doctrine:fixtures:load --no-interaction
  Heberger le site en localhost 
$ symfony serve:start
```