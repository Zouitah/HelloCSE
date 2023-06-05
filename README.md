# HelloCSE-test

1-  Install Composer 2.*
2-  Install PHP 8.*
3-  Install mysql 8.*
4-  Isntall node 16.20
5-  Install npm 8.19.*
6-  Copy .env.example to .env and edit the .env file
7-  Exec "Composer install"
8-  Exec "php artisan key:generate"
9-  Exec "php artisan storage:link"
10- Exec "php artisan migrate && php artisan db:seed && php artisan serve"
11- In another terminal exec "npm install && npm run dev"
12- You can now run the app (Use the credentials in the /database/seeders/DatabaseSeeder.php to connect)