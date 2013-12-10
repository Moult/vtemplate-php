<?php
/**
 * @license MIT
 * Full license text in LICENSE file
 */

// Bootstraps necessary Kohana dependencies to run Behat tests.

$application = 'application';
$modules = 'vendor/kohana-module';
$system = 'vendor/kohana/core';

define('EXT', '.php');

error_reporting(E_ALL | E_STRICT);

define('DOCROOT', realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR);
define('APPPATH', realpath($application).DIRECTORY_SEPARATOR);
define('MODPATH', realpath($modules).DIRECTORY_SEPARATOR);
define('SYSPATH', realpath($system).DIRECTORY_SEPARATOR);

unset($application, $modules, $system);

require APPPATH.'bootstrap'.EXT;
