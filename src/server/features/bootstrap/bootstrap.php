<?php
/**
 * @license MIT
 * Full license text in LICENSE file
 */

// Bootstraps necessary Kohana dependencies to run Behat tests.

$application = '@MAKKOTO_WEBSITE@';

$config = require $application.'/config/config.php';

$modules = 'server/vendor/kohana-module';
$system = 'server/vendor/kohana/core';
$vendor = 'server/vendor';
$asset = $config['path']['assets'];

define('EXT', '.php');

error_reporting(E_ALL | E_STRICT);

define('DOCROOT', realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR);
define('APPPATH', realpath($application).DIRECTORY_SEPARATOR);
define('MODPATH', realpath($modules).DIRECTORY_SEPARATOR);
define('SYSPATH', realpath($system).DIRECTORY_SEPARATOR);
define('VENDORPATH', realpath($vendor).DIRECTORY_SEPARATOR);
define('ASSETPATH', realpath($asset).DIRECTORY_SEPARATOR);

unset($application, $modules, $system, $vendor, $asset);

require APPPATH.'bootstrap'.EXT;
