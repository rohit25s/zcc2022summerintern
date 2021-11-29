# to install dependencies from composer.json
```
composer install
composer require laravel/ui

npm install && npm run dev
```

copy .env.example into .env <br/>

- generate key <br/>
```
php artisan key:generate
```
- edit database schema section to match local database created <br/>
- Update Api credentials in **.env** <br/>
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=zendesk
DB_USERNAME=root
DB_PASSWORD=

user='test_user_email'
token='test_token'
base_uri=https://<subdomain>/api/v2/
```
# to migrate database
```
php artisan migrate
```
# start server
```
php artisan serve
```

# How to Use
## open in browser
http://127.0.0.1:8080/home

if not a returning user<br/>
**register** and then **login**
otherwise <br/>
**login** using credentials used to register. <br/>

Click on **List Tickets** button to list tickets
Each ticket when clicked upon takes to a details page for that ticket.

# to run tests
copy .env.example into .env.testing <br/>
- Update Api Credentials in **.env.testing** <br/>
```
user='test_user_email'
token='test_token'
base_uri=https://<subdomain>/api/v2/
```
- run
```
php artisan test --env=testing
```

# to setup composer
* on mac
```
brew install composer
```
or <br/>
- follow instructions on the page https://getcomposer.org/download/

# to fix node issues(if any)
```
npm i vue-loader
```

# Demo
[Demo](https://github.com/rohit25s/zcc2022summerintern/blob/main/Demo/README.md)