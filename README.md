open-dai.eu
===========

Website for the Open-DAI project at open-dai.eu

## Install Wordpress

Dependencies are installed using [Composer](http://getcomposer.org):

```
php composer.phar install
```

Create wp-config.php in the project root:

```
cp wordpress/wp-config-sample.php ./wp-config.php
```

Configure wp-config.php with your database details. For development environments it is recommended you set `define('WP_DEBUG', true)`. You also need to set up some directories to run Wordpress from a separate directory:

```php
/**
 * Wordpress URLs
 * Configured to access Wordpress core in a separate folder
 */

if ( !defined('WP_CONTENT_DIR') )
  define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/app' );
  
if ( !defined('WP_CONTENT_URL') )
  define( 'WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/app' );

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
  define('ABSPATH', dirname(__FILE__) . '/wordpress/');
```


## Initialize theme

This will install dependencies and generate assets in the theme folder:

```
cd app/themes/open-dai
npm install
grunt
```

