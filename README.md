## Notes

Create database file

    touch database/database.sqlite

Run Database patches:

    php artisan migrate:fresh

Run Seeder:

    php artisan db:seed

## Example of .env file

    APP_NAME=Laravel
    APP_ENV=local
    APP_KEY=base64:3Cx2qVriNH5Wjqy0F7XzNypc5cTRH6TaLYtR0z+ike8=
    APP_DEBUG=true
    APP_URL=http://localhost

    LOG_CHANNEL=stack
    LOG_LEVEL=debug

    DB_CONNECTION=sqlite
