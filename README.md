# Abees - Simple absensi apps using slim framework

### Kebutuhan

- PHP 5.5.9 keatas.
- HTTP Server, misal NginX or Apache.
- MySQL Server 5.x keatas untuk database utama.

### Menggunakan

- [Slim Framework 3](http://www.slimframework.com/)
- [Laravel Database](https://github.com/illuminate/database)
- [Robmorgan Phinx Migrations](https://phinx.org/)
- [Vlucas Valitron Validator](https://github.com/vlucas/valitron)
- [Vlucas phpdotenv](https://github.com/vlucas/phpdotenv)

### Instalasi

1) Clone repo
```
$ git clone https://github.com/choirulafandi/abees [folder-name]
```
2) Masuk ke directory & install dependency

```
$ cd [folder-name] && composer install
```
3) Init phinx migration dan edit migrations config di phinx.yml file
```
$ php vendor/bin/phinx init
```
4) Buat .env di project root dan setting environment mu
```
$ cp .env.example .env
```
5) Gunakan PHP built in server dan arahkan ke folder web sebagai docroot.
```
$ php -S  localhost:8080 -t web/
```
6) Terakhir, buka url sesuai dengan konfigurasi lokal server anda.

### Struktur Direktori

| Path | Keterangan |
| --- | --- |
| `app/` | Direktori utama aplikasi |
| `migration/` | Direktori database |
| `app/src/` | Direktori source code aplikasi |
| `web/` | Direktori public |
