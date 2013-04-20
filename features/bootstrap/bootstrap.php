<?php
/**
 * Bootstraps necessary Kohana dependencies to run PHPSpec tests.
 * From docroot, run `phpspec spec/ --bootstrap spec/bootstrap.php`
 *
 * @author    Dion Moult <dion@thinkmoult.com>
 * @copyright (c) 2013 Dion Moult
 * @license   MIT
 */

$application = 'application';
$modules = 'modules';
$system = 'system';

define('EXT', '.php');

error_reporting(E_ALL | E_STRICT);

define('DOCROOT', realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR);
define('APPPATH', realpath($application).DIRECTORY_SEPARATOR);
define('MODPATH', realpath($modules).DIRECTORY_SEPARATOR);
define('SYSPATH', realpath($system).DIRECTORY_SEPARATOR);

unset($application, $modules, $system);

require APPPATH.'bootstrap'.EXT;
