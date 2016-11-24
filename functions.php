<?php

define('HSO_PATH', get_stylesheet_directory() . '/');

//Include vendor files
if (file_exists(dirname(ABSPATH) . '/vendor/autoload.php')) {
    require_once dirname(ABSPATH) . '/vendor/autoload.php';
}

require_once HSO_PATH . 'library/Vendor/Psr4ClassLoader.php';
$loader = new HSO\Vendor\Psr4ClassLoader();
$loader->addPrefix('HSO', HSO_PATH . 'library');
$loader->addPrefix('HSO', HSO_PATH . 'source/php/');
$loader->register();

new HSO\App();

// Full menu walker
require_once('includes/FullMenuWalker.php');
// Quick menu walker
require_once('includes/QuickMenuWalker.php');