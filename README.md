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

## Configuration

First, you must publish the configuration file and then configure your
API parameters in the .env file.


### Publish configuration

```sh
php artisan vendor:publish --tag=mailproconfig
```

It creates a `mailpro.php` file  in your `config/` folder.

### Environment parameters

Change default mail driver config in `.env`:

```sh
MAIL_DRIVER=mailpro
```

Add your parameters to you `.env`:

```sh
MAILPRO_CLIENT_ID=123456
MAILPRO_API_KEY=myApiKey
MAILPRO_EMAIL_ID=654321
```


## Usage

There is nothing much to do. Now, all classes that extends a
`Mailable` (`Illuminate\Mail\Mailable`) will use this driver.


