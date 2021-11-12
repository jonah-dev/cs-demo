# Requirements

- PHP ^8.0
- Docker

# Setup

`composer install`

`npm install`

`./vendor/bin/sail up`

`cp .env.example .env`

Update your env file to include if they are not present
```
FORWARD_DB_PORT=3306
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=comment_sold
DB_USERNAME=sail
DB_PASSWORD=password
```

Run Migrations 

note: this also imports data so the last migration might take up to 10 minutes

`php artisan migrate`

Navigate to
`localhost/home`