laravel-mailpro-driver
======================

A PHP library to send an email only to one email with Laravel using
[Mailpro](https://mailpro.com) API (Maxony).

[API manual (PDF)](https://admin.mailpro.com/api/Mailpro_API.pdf)

Before using this library, you MUST have :

- an API Key
- a client id
- an email id (From)

## Install

```sh
composer require landrok/laravel-mailpro-driver
```

## Configure

### Publish configuration

```sh
php artisan vendor:publish --tag=mailproconfig
```

It copies `mailpro.php` to your `config/` folder.

### Environment parameters

Add your parameters to you `.env`:

```sh
MAILPRO_CLIENT_ID=123456
MAILPRO_API_KEY=myApiKey
MAILPRO_EMAIL_ID=654321
```

## Usage

