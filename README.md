## Getting Started
### Technologies
- Laravel 11
- MySQL
- Bootstrap 5.3.3
- Vuejs 3 - options api
- Inertiajs

### Prerequisites

- PHP >= 8.2
- Composer (Install at: https://getcomposer.org/download/)
- Node.js and npm (Install at: https://nodejs.org/)
- MySQL database

### Installation

1. Clone the repository and navigate to its directory
2. Create a .env file from .env.example:
   ```sh
   cp .env.example .env
    ```
- Modify .env:
    - configure the database
        ```
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=your_database_name
        DB_USERNAME=your_username
        DB_PASSWORD=your_password
        ```
4. Run these commands
     ```sh
     composer install
     npm install && npm run build
     php artisan key:generate
     php artisan migrate --seed
     ```
5. Serve the app by running command bellow - or use any other preferred way
    ```sh
    php artisan serve
    ```

---
If you have any questions or need further assistance, don't hesitate to contact me.
