# The Kraut Newsletter package

[![Total Downloads](https://poser.pugx.org/TobyMaxham/kraut-newsletter/downloads.svg)](https://packagist.org/packages/TobyMaxham/kraut-newsletter)
[![Latest Stable Version](https://poser.pugx.org/TobyMaxham/kraut-newsletter/v/stable.svg)](https://packagist.org/packages/TobyMaxham/kraut-newsletter)
[![Latest Unstable Version](https://poser.pugx.org/TobyMaxham/kraut-newsletter/v/unstable.svg)](https://packagist.org/packages/TobyMaxham/kraut-newsletter)
[![License](https://poser.pugx.org/TobyMaxham/kraut-newsletter/license.svg)](https://packagist.org/packages/TobyMaxham/kraut-newsletter)
[![Finished](https://img.shields.io/badge/finished-45%25-yellow.svg)](http://maxham.de)

A package to manage newsletter in Laravel 5.

## Documentation

We currently have essentially no documentation at the moment, but are working on it, and are open to pull requests.


## Installation

Edit the Laravel Application config file and add the Newsletter Service Provider from this package.
Register the Service Provider
```php
// config/app.php
'providers' => [
    ...
    'TobyMaxham\Newsletter\NewsletterServiceProvider',
    ...
];
```

If you use this package with database objects you can publish the Newsletter Service Provider and run the migration files.
```
php artisan vendor:publish --provider="TobyMaxham\Newsletter\NewsletterServiceProvider"

// Create the migration
php artisan make:migration create_lists_table
php artisan make:migration create_subscribrs_table
php artisan make:migration create_list_subscribrs_table
´´´

Maybe you only use the API without database object, you can publish just the config file.
```
php artisan vendor:publish --provider="TobyMaxham\Newsletter\NewsletterServiceProvider" --tag="config"
```

After that you will have added this files to your root:
    - config
       kraut-newsletter.php
    - database
        - migrations
            XXX_create_lists_table.php
            XXX_create_subscribrs_table.php
            XXX_create_list_subscribrs_table.php

The configuration file will be accassible with Laravel Config Class:
```php
Config::get('kraut-newsletter.mode');
```


## How to use

Register a new subscriber
```php

// Simply add a new subscriber.
Newsletter::subscribe('Heiko@nothing-on-website.net');

// Attach the subscriber on a NewsletterList.
Newsletter::subscribe('francis@clouding.net', 'Evil Mailing');

// Add some user informations
Newsletter::subscribe('Heiko@nothing-on-website.net', ['firstname' => 'Heiko'], 'The Simple List');
```

Also you can remove a subscriber.
```php

// Remove from all Newsletter Lists and delete from subscriber
Newsletter::unsubscribe('francis@clouding.net');

// Only remove from a special list
Newsletter::unsubscribe('abraham@krauts.ru', 'Free Tutorials');
```


### The name

By using this package you'll get more time to eat kraut.


## License

TobyMaxham'S Kraut Newsletter is licensed under [The MIT License (MIT)](LICENSE).
