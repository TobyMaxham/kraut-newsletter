# The Kraut Newsletter package

[![Build Status](https://travis-ci.org/TobyMaxham/kraut-newsletter.svg)](https://travis-ci.org/TobyMaxham/kraut-newsletter)
[![Coverage Status](https://coveralls.io/repos/TobyMaxham/kraut-newsletter/badge.svg?branch=master&service=github)](https://coveralls.io/github/TobyMaxham/kraut-newsletter?branch=master)
[![Total Downloads](https://poser.pugx.org/TobyMaxham/kraut-newsletter/downloads.svg)](https://packagist.org/packages/TobyMaxham/kraut-newsletter)
[![Latest Stable Version](https://poser.pugx.org/TobyMaxham/kraut-newsletter/v/stable.svg)](https://packagist.org/packages/TobyMaxham/kraut-newsletter)
[![Latest Unstable Version](https://poser.pugx.org/TobyMaxham/kraut-newsletter/v/unstable.svg)](https://packagist.org/packages/TobyMaxham/kraut-newsletter)
[![License](https://poser.pugx.org/TobyMaxham/kraut-newsletter/license.svg)](https://packagist.org/packages/TobyMaxham/kraut-newsletter)
[![Minneola](https://img.shields.io/badge/finished-45%25-yellow.svg)](http://maxham.de)

A package to manage newsletter in Laravel 5.

## Installation

Register the Service Provider
```php

// config/app.php
'providers' => [
    ...
    'TobyMaxham\Newsletter\NewsletterServiceProvider',

];
```

## Documentation

We currently have essentially no documentation at the moment, but are working on it, and are open to pull requests.


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
