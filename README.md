# Text Up and Down Voting Web Interface

CMS for up and down voting for simple texts, like jokes, names, etc.

Up and down voting can be done without logging in.

### Installing
```bash
composer install
php -r "file_exists('.env') || copy('.env.example', '.env');"
php artisan key:generate --ansi
# Edit the .env file
php artisan migrate
npm install
npm run production
php artisan signup:admin <email> <name> # Creating a admin account.
```

### Admin Panel

A admin panel is available at ```/admin```, a user can be created with ```php artisan signup:admin <email> <name>```.

### Demo

Online demo will be there in the future.
