# Local Project Setup

## 1. Install required software:
Before you begin, make sure you have the following tools installed:
- **PHP** (PHP 8.12 or later)
- **Composer** (PHP dependency manager)
- **Node.js** (Frontend dependency manager)
- **Git** (for version control)

## 2. Clone the project to your local machine
git clone https://github.com/MariuszMalankiewicz/simple-blog-for-ominimo.git

## 3. Navigate to the project directory:
After cloning the project, navigate to its directory:
cd simple-blog-for-ominimo

## 4. Install PHP dependencies:
Using Composer, install all the PHP dependencies of the project:
composer install

## 5. Install JavaScript dependencies:
Using Npm, install all the frontend dependencies of the project:
npm install

## 6. Configure the .env file:
Copy the example .env file and adjust it to your local settings:
cp .env.example .env
Next, open the .env file and update information such as:<br>
DB_CONNECTION = mysql<br>
DB_HOST = your host (default: 127.0.0.1)<br>
DB_PORT = your port (default: 3306)<br>
DB_DATABASE = your name of database in your mysql (default: laravel)<br>
DB_USERNAME = your username (default: root)<br>
DB_PASSWORD = your password (this field is empty)

## 7. Generate the application key:
Laravel requires an application key to encrypt data. Use the following command to generate it:
php artisan key:generate

## 8. Migrate the database:
Create the database structure using migrations:
php artisan migrate

The project also uses a function to populate the database called seed:
php artisan db:seed

## 9. Build front-end assets:
run the appropriate command to build the frontend files
npm run dev

## 10. Run the local server:
You can now start Laravel's built-in PHP server:
php artisan serve

By default, the server will be available at: http://localhost:8000