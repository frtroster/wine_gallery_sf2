Wine Gallery ORM Designer Demo Project
======================================

ORM Designer is a visual editor for ORM frameworks. This is a demo project
to show ORM Designer capabilities for Symfony 2 and Doctrine 2.

1) Installing Symfony Standard Edition
--------------------------------------

We'll be using recommended way of [installing Symfony][1] framework with [Composer][2].
Create a folder for our new project:

    mkdir wine_gallery_sf2

Download Composer:

    curl -sS https://getcomposer.org/installer | php

Generate new Symfony application:

    php composer.phar create-project symfony/framework-standard-edition wine_gallery_sf2 2.2.1
    cd wine_gallery_sf2/

Update dependencies:

    php ../composer.phar update

Check you're good to go:

    php app/check.php

You can see this stage:

    git checkout sf2-initialized

2) Generate WineBundle and edit in ORM Designer 2
-------------------------------------------------

Winebundle contains entities of Restaurants ordering Wines made of mixed GrapeVarieties
from different Winemakers.

Generate WineBundle:

    php app/console generate:bundle --namespace=Acme/WineBundle

Configure ORM Designer project and set the default bundle:

  * Create new project: doc/01_create-new-project.jpg
  * Set project name and paths: doc/02_configure-new-project.jpg
  * Configure module:
    doc/03_configure-module.jpg
    doc/04_configure-module-name.jpg
    doc/05_configure-module-export.jpg

Create entities:

  * Edit entity: doc/06_edit-entity.jpg
  * Add entity index:
    doc/07_add-entity-index.jpg
    doc/08_configure-entity-index.jpg
  * Create new entity: doc/09_create-new-entity.jpg
  * Configure filename of entity class: doc/10_configure-entity-filename.jpg

Create associations:

  * Create new association: doc/11_create-association.jpg
  * Set association properties: doc/12_configure-entity-association.jpg
  * Configure caption: doc/13_name-entity-association.jpg
  * Create new many-to-many association: doc/14_create-many-to-many-association.jpg
  * Set many-to-many association properties: doc/15_configure-many-to-many-association.jpg

Make our model look better:

  * Use grid for aligning model: doc/16_use-grid.jpg
  * Place entities properly: doc/16_use-grid.jpg

You can see this stage:

    git checkout wine-bundle

3) Generate SimpleCrmBundle and edit in ORM Designer 2
------------------------------------------------------

Let's add a very simple crm to see how we got information about certain restaurant.

Generate SimpleCrmBundle:

    php app/console generate:bundle --namespace=Acme/SimpleCrmBundle

Add new module to ORM Designer:

  * Add new module: doc/18_create-new-module.jpg
  * Configure module:
    doc/19_configure-module.jpg
    doc/20_configure-module-export.jpg
  * Set module color: doc/21_set-module-color.jpg

Uni-directional many-to-many association:

  * Create uni-directional association: doc/22_create-one-way-many-to-many-association.jpg
  * Set caption and split association:
    doc/23_set-association-caption-and-split.jpg
    doc/24_association-caption-and-split.jpg
  * Set ORM framework specific association features: doc/26_configure-orm-association-features.jpg

Don't forget to set module namespace:

  * doc/25_configure-module-namespace.jpg

You can see this stage:

    git checkout simple-crm-bundle

4) Make it all work
-------------------

Export Entities from ORM Designer:

  * One click export: doc/27_export.jpg

Generate database schema:

    php app/console doctrine:schema:update --force

Generate getters and setters:

    php app/console doctrine:generate:entities Acme

You can see this stage:

    git checkout after-export

See how it works:

    git checkout save-entity

[1]:  http://symfony.com/doc/2.1/book/installation.html
[2]:  http://getcomposer.org/