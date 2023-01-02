
# VMOKSHA Website


# Installation
- Download or Clone this repository
```
git clone https://github.com/vmokshaproducts/vmoksha-website.git
```
- Create a new database
- Copy or rename file ```.env.example``` to ```.env```, and edit the file to change the attributes for database to your database configurations (host,username,password etc)
-  Open up Command Prompt(CMD) or Terminal in the project directory and run these commands:
```
composer install or composer update
php artisan key:generate
php artisan migrate
php artisan storage:link
```
- Launch web server
```
php artisan serve
```

- See full [documentation](https://laravel.com/docs/8.x/installation)

# Credits
* Laravel PHP Framework - [website](https://laravel.com/docs/5.3/installation)
* Bootstrap Framework - [website](http://getbootstrap.com/)
* jQuery Library - [website](https://jquery.com/)
* Font Awesome - [website](http://fontawesome.io/)
