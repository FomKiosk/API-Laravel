## Kassakiosk Management ##

This is the management part of the Kassakiosk application
This application will provide:

- The api for the kassakiosk instances: these instances are
    - The Kiosk
    - The station
    - The management panel
- In this management panel you can
    - Add new Kiosks
    - add new stations
    - see some handy charts :)

### Installation ###
- Clone this repository
- Run ```composer install```
- Run ```npm install```
- Copy the ```.env.exaple``` file into the ```.env``` file with ```$ cp .env.example .env```
- Replace placeholder environment variables with your own variables
- Run ```php artisan key:generate``` to set the application key
- Run ```php artisan migrate``` to execute all migrations
- Run ```php artisan db:seed``` to seed the database with test data

## Explanations for certain packages ##
### How to add a new package ###
--------------------

There is a packages folder in the root directory of this project. If you want to add a new namespace, just create a new folder in this directory with your name (or alias)
Make sure you place different folders per side-package you maken under your name f.e. If you have an admin package and a blog package and you alias is calie, your folder structure should look like this:

- calie
    - admin
        - src: package files
    - blog
        - src: package files
        
### Add the package to the composer psr-4 autoloader###
On development you can just add the package to your psr4 autoloader namespace

In the composer.json file add the following line per package:

```
"autoload": {
    ...
    "psr-4": {
        "App\\": "app/",
        "Calie\\Admin\\": "packages/calie/admin/src",
        "Calie\\Blog\\": "packages/calie/blog/src"
    }
    ...
},
```

After this you can run the following command:

```
composer dump-autoload
```