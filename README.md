## Sistem Informasi Perpustakaan

#### Download

Download atau clone project dari gitlab:

```sh
https://gitlab.com/chaubatkunda/laraperpus.git
```

Jalankan coomposer install pada terminal

```sh
composer install
```

copy atau rubah file env.example menjadi .env dan masukan nama database pada DB_DATABASE= setelah itu ketikkan pada terminal perintah di bawah ini.

```sh
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan storage:link
```

###### Account Login

email : `admin@laraperpus.com`
password : `password`

###### Note

Setelah semuanya sudah selesai dijalankan configurasi account email atau testing dengan menggunakan mailtrap.

| Tools      | Readme                    |
| ---------- | ------------------------- |
| Laravel    | https://laravel.com/      |
| VueJs      | https://vuejs.org/        |
| Inertia Js | https://inertiajs.com/    |
| Bootstrap  | https://getbootstrap.com/ |

| Plugin           | Readme                                      |
| ---------------- | ------------------------------------------- |
| AOS              | https://michalsnik.github.io/aos/           |
| Vue Feather ICON | https://fengyuanchen.github.io/vue-feather/ |
