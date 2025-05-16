# Laravel Order Processing System

## Installation and Setup

1. **Install PHP dependencies**

   composer install

2. **Install frontend dependencies (optional)**

   npm install
   npm run dev

3. **Configure your database**
   Update your `.env` file with the following:

   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=order_processing
   DB_USERNAME=root
   DB_PASSWORD=

4. **Run migrations and seeders**

   php artisan migrate
   php artisan db:seed

5. **Setup and start the queue worker**

   php artisan queue:work