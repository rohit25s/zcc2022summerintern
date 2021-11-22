# to install dependencies from composer.json
```
composer install 
 
composer install
composer require laravel/ui
php artisan ui vue --auth

npm install && npm run dev
```

copy .env.example into .env <br/>
edit database schema section to match local database created <br/>
Update Api credentials in .env.example <br/>
# to migrate database
```
php artisan migrate

# start server
php artisan serve
```

# open in browser
http://127.0.0.1:8080/home

if not a returning user, register and then login otherwise login using credentials used to register.

# to fix node issues
```
npm i vue-loader
```