# KanBan #

**organize your projects** 

### Installation

- type git clone git@github.com:mthdht/kanban.git to clone the repository
- type cd kanban
- type composer install
- type composer update
- copy .env.example to .env
- type php artisan key:generateto generate secure key in .env file
- if you use MySQL in .env file :
    - set DB_CONNECTION
    - set DB_DATABASE
    - set DB_USERNAME
    - set DB_PASSWORD
- if you use sqlite :
    - type touch database/database.sqlite to create the file
    - type php artisan migrate --seed to create and populate tables
edit .env for emails configuration

### Include

- [Barryvdh debugbar](https://github.com/barryvdh/laravel-debugbar)

### Contributing

You want to help ? Easy, just:

 - Fork the repository
 - make your own branch
 - do your things :)
 - make a pull request to develop branch

License