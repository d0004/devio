# Laravel Blog

## Install

Install dependencies:

```bash
docker run --rm \
-v $(pwd):/app \
-w /app \
laravelsail/php84-composer:latest \
composer install
```

## Run project

Start Sail:

```bash
./vendor/bin/sail up -d
```

Run migrations and seed database:

```bash
./vendor/bin/sail artisan migrate --seed
```

## Admin login

Email: admin@admin.lv
Password: password

Admin panel:

http://localhost/admin

## Public blog

http://localhost
