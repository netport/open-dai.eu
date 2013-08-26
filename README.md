open-dai.eu
===========

Website for the Open-DAI project at open-dai.eu

## Installation

Install dependencies with [Composer](http://getcomposer.org):

```
php composer install
```

Create your own wp-config.php in the project root:

```
cp wordpress/wp-config-sample.php ./wp-config.php
```

Configure wp-config.php with your database details. For development environments it is recommended you set `define('WP_DEBUG', true)`. Because Wordpress runs from a separate directory you need to set different URLs for SITE and HOME:

```php
/**
 * Wordpress URLs
 * Configured to access Wordpress core in a separate folder
 */
define('WP_HOME', 'http://' . $_SERVER['SERVER_NAME'] . '/wordpress');
define('WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME']);
```
