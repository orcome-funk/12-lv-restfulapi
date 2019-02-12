# Restful api

The restfulapi training project with case studies managing registration for meetings.


## Requirements

1. PHP 7.1.3 (and meet [Laravel 5.7 server requirements](https://laravel.com/docs/5.7#server-requirements)),
2. MySQL or MariaDB database.

## How to Install

1. Clone the repo : `git clone git@github.com:orcome-funk/12-lv-restfulapi.git meeting-api`
2. `$ cd meeting-api`
3. `$ composer install`
4. `$ cp .env.example .env`
5. `$ php artisan key:generate`
6. Create new MySQL database for this application  
(with simple command: `$ mysqladmin -urootuser -p create meeting_api`)
7. Set database credentials on `.env` file
8. `$ php artisan migrate`
9. `$ php artisan serve`
10. Play around with [POSTMAN](https://www.getpostman.com).

## Endpoint Listing

(todo)
