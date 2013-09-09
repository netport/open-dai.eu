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
cp wp-config-sample.php wp-config.php
```

Configure wp-config.php with your database details. For development environments it is recommended you set `define('WP_DEBUG', true)`.


## Initialize theme

This will install dependencies and generate assets in the theme folder:

```
cd app/themes/open-dai
npm install
grunt
```

