# Staff Management

The site was created as a project for a third year class project. It is a database manager for staff and rooms with the possibility of editing through the web environment. The project uses a backend PHP framework [Laravel](https://laravel.com/) and a frontend JS framework [Svelte](https://svelte.dev/). The connection of these 2 technologies without using API is handled by [Inertia](https://inertiajs.com/).

## Instalation

First we need to install the necessary dependencies to the Laravel framework using [instructions in the official Laravel documentation](https://laravel.com/docs/7.x#installation).

Then we install the necessary dependencies for both frameworks.

```
npm install && composer install
```

## Configuration

Create a new .env file based on the attached example file

```
cp .env.example .env
```

and replace the following variables:

```
APP_NAME=staff-management
APP_ENV=local
APP_KEY= key obtained using php artisan key:generate
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST= database host
DB_PORT= database port
DB_DATABASE= name of the database
DB_USERNAME= database username
DB_PASSWORD= database password
```

Then migrate the database using the command:

```
php artisan migrate
```

and create a demo user using `php artisan db:seed`.

## Running

To start the application server, use the command:

```
php artisan serve
```

Use the `npm run production` or `npm run dev` commands to generate new frontend files after any modifications.