# Requirements

- PHP ^8.0
- Docker

# Setup

`composer install`

`npm install`

`./vendor/bin/sail up`

Run Migrations 

note: this also imports data so the last migration might take up to 10 minutes

`php artisan migrate`

Navigate to
`localhost/home`