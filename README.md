
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<strong>Why use laravel</strong>
- Laravel is a popular PHP framework that is widely used for web application development, including building APIs.
- Elegant Syntax: Laravel is known for its clean, expressive, and readable syntax, which makes development faster and more enjoyable. This can significantly speed up the process of building APIs.
- Rich Documentation: Laravel provides comprehensive documentation, making it easy for developers to get started and find solutions to issues quickly.
- API Authentication: Laravel provides easy-to-use authentication systems, including options like Laravel Passport (OAuth2) for API authentication or Laravel Sanctum for simpler token-based authentication. This makes securing your API endpoints straightforward.
- CSRF Protection: Laravel automatically protects your app from Cross-Site Request Forgery (CSRF) attacks, though this is mostly for web applications, it still can be relevant for certain API interactions, especially if your API supports browser-based requests.
- Input Validation & Sanitization: Laravel offers powerful validation mechanisms to ensure that incoming API requests are properly validated, reducing the risk of malicious inputs.
- Laravel is designed with RESTful principles in mind, making it easy to define routes that correspond to CRUD operations (Create, Read, Update, Delete) for your API.
- You can define simple routes for each HTTP method (GET, POST, PUT, DELETE) in a way that is easy to understand and implement.
- Eloquent ORM: Laravel's Eloquent ORM (Object-Relational Mapping) is a powerful tool for interacting with databases. It simplifies database queries and relationships, making it easy to interact with your data models.
- Middleware: Laravel includes middleware for handling cross-cutting concerns, such as authentication, authorization, and logging. This is useful for API endpoints where you might want to apply global filters or authentication checks.

<strong>To setup the project simply follow steps below: </strong>
- Clone or download the repo : https://github.com/seskie-web/users-api.git
- Rename .env.example to .env
- Update the database connection string on the renamed .env file to point to your local db
- e.g 
    - DB_CONNECTION=mysql
    - DB_HOST=127.0.0.1
    - DB_PORT=3306
    - DB_DATABASE=tasks
    - DB_USERNAME=seskie  
    - DB_PASSWORD=seskiev
- Run command: composer update to download the needed packages by the framework
- Set permissions on the project to 755 or 777 since its a local project, for detailed instructions please refer to: https://www.hostinger.com/tutorials/how-to-install-laravel-on-ubuntu
- Run command: php artisan migrate to run the database migrations, the migration command will create a table named authors on your database and some default tables needed by laravel to run properly, the database migration files can be found on appname/database/migrations/, 2024_11_09_140743_create_authors_table.php is the migration file that will create a table named authors on your local database 
- Run command: php artisan serve to start the backend api server, which will run on http://127.0.0.1:8000
- e.g
  ![Screenshot from 2024-11-11 06-16-29](https://github.com/user-attachments/assets/4d2086c2-5879-430c-901b-2f4a375f1116)
- You can now test the api following the examples below
  ![Screenshot from 2024-11-11 06-32-54](https://github.com/user-attachments/assets/ed9c7039-e37b-4f94-af9b-ed07edc7c3b7)
![Screenshot from 2024-11-11 06-34-23](https://github.com/user-attachments/assets/981234bd-9df2-4630-af8b-dec7c3bdaa3e)
![Screenshot from 2024-11-11 06-35-12](https://github.com/user-attachments/assets/31f49390-b862-4290-9e91-2a02d8a13621)

