## PHPU_2.6.1

PHPU_2.6.1 is a lightweight, procedural PHP and MySQL based CMS designed for simplicity, flexibility, and security. Its clean structure makes it easy to extend, customize, and maintain.

*Technologies*

![PHP](https://img.shields.io/badge/PHP-8.4-blue.svg)
![Procedural PHP](https://img.shields.io/badge/PHP-Procedural-blue.svg)
![MySQLi](https://img.shields.io/badge/MySQLi-blue.svg)
![HTML](https://img.shields.io/badge/HTML-5-orange.svg)
![CSS](https://img.shields.io/badge/CSS-3-blue.svg)
![GIMP](https://img.shields.io/badge/GIMP-2.x-blue.svg)


*Requirements*
1. *Web server*: Apache with `mod_rewrite` enabled.
2. *PHP*: version 8.2–8.4.
3. *Database*: MySQL with mysqli extension enabled.
   
*Installation*

1. *Database setup*: Insert the database credentials into the `config/config.php` file.
2. *Create tables*: Create the necessary tables using the provided SQL code.
3. *Create user account*: Sign up for a new user account using the registration form.
4. *Assign administrator privileges*: Change the user level to `administrator` in phpMyAdmin.


If you want to redirect your domain directly to the public directory, then delete the `.htaccess` file in the root directory. Otherwise, simply redirect the domain to the project folder.

This project includes the free version of Font Awesome. All icons and assets are subject to the Font Awesome license, which applies independently of PHPU_2.6.1’s license. Users are responsible for complying with Font Awesome’s terms.


If any bugs appear, it’s probably because I was listening to Dumb by Nirvana on repeat while coding :)
