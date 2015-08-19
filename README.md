# Acuity Scheduling PHP Sample App

An OAuth2 sample app using the [Acuity Scheduling PHP dev kit](https://github.com/AcuityScheduling/acuity-php).

## Setup

First install the dependencies (Acuity Scheduling's PHP dev kit) using composer.

```
composer update
```

Then fill out the `config.php` file with your OAuth2 client credentials.  See [config.example.php](config.example.php) for an example.

### `config.php`

```php
<?php

define('CLIENT_ID', 'YOUR_CLIENT_ID');
define('CLIENT_SECRET', 'YOUR_CLIENT_SECRET');
define('REDIRECT_URI', 'YOUR_REDIRECT_URI');
```

Once that's set up, you can start a server.  Either install this app in your existing PHP server, or run it using the built-in PHP server:

```php
php -S localhost:8000 -t .
```

