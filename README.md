# JOBIFY
Jobboard web application built with Laravel that lets job seekers to apply for job offers created by companies.

## How to use

1. Download the project and place it inside the htdocs folder if you use xampp as a local server or www for wamp server.
2. Go to the root folder using cd command on your cmd or terminal
3. Run composer install on your cmd or terminal
4. Copy .env.example file to .env on the root folder
5. Create a database in phpmyadmin
6. Open your .env file and change the database name (DB_DATABASE) to the one you created using phpmyadmin, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration. 
7. By default, the username is root and you can leave the password field empty. (This is for Xampp) 
8. By default, the username is root and password is also root. (This is for Lamp)
9. Run php artisan key:generate
10. Run php artisan migrate(this command create all the database tables)
11. Run php artisan serve(this command runs the server)
12. Go to localhost:8000
