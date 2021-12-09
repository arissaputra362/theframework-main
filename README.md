# The Framework - PHP MVC Framework
Custom framework created for education.

## This framework is not well tested, just for educational purpose.
**Related app package was using in this framework**: https://github.com/arissaputra362/the-framework-mvc

----

## Required tool

1. XAMPP

## How to Install

1. Download the archive or clone the project using git
2. Create database in localhost/phpmyadmin
3. Copy `.env.example` file and rename to '.env', adjust database parameters with your own account(include database name)
4. Run `composer install` in the command
5. Run migrations by executing `php migrations.php` from the project root directory
6. Change directory to the `public` folder 
7. Start php server by running command `php -S 127.0.0.1:8080` or 'php -S localhost:8080'
8. Open in browser http://127.0.0.1:8080 or http://localhost:8080
