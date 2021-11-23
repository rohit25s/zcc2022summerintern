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
Update Api credentials in .env <br/>
# to migrate database
```
php artisan migrate

# start server
php artisan serve
```
# How to Use
## open in browser
http://127.0.0.1:8080/home

if not a returning user, register and then login otherwise login using credentials used to register. <br/>

Click on **List Tickets** button to list tickets
Each ticket when clicked upon takes to a details page for that ticket.

# to run tests
copy .env.example into .env.testing <br/>
Update Api credentials in .env.testing <br/>
run
```
php artisan test --env=testing
```
# to fix node issues(if any)
```
npm i vue-loader
```