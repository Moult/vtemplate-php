<?php defined('SYSPATH') OR die('No direct script access.');

// -- Environment setup --------------------------------------------------------

// Load the core Kohana class
require SYSPATH.'classes/Kohana/Core'.EXT;

if (is_file(APPPATH.'classes/Kohana'.EXT))
{
    // Application extends the core
    require APPPATH.'classes/Kohana'.EXT;
}
else
{
    // Load empty core extension
    require SYSPATH.'classes/Kohana'.EXT;
}

/**
 * Set the default time zone.
 *
 * @link http://kohanaframework.org/guide/using.configuration
 * @link http://www.php.net/manual/timezones
 */
date_default_timezone_set('UTC');

/**
 * Set the default locale.
 *
 * @link http://kohanaframework.org/guide/using.configuration
 * @link http://www.php.net/manual/function.setlocale
 */
setlocale(LC_ALL, 'en_US.utf-8');

/**
 * Enable the Kohana auto-loader.
 *
 * @link http://kohanaframework.org/guide/using.autoloading
 * @link http://www.php.net/manual/function.spl-autoload-register
 */
spl_autoload_register(array('Kohana', 'auto_load'));

/**
 * Load vendor applications.
 */
// spl_autoload_register(function($class) { Kohana::auto_load($class, 'vendor/App/Core/src'); });

/**
 * Optionally, you can enable a compatibility auto-loader for use with
 * older modules that have not been updated for PSR-0.
 *
 * It is recommended to not enable this unless absolutely necessary.
 */
// spl_autoload_register(array('Kohana', 'auto_load_lowercase'));

/**
 * Enable the Kohana auto-loader for unserialization.
 *
 * @link http://www.php.net/manual/function.spl-autoload-call
 * @link http://www.php.net/manual/var.configuration#unserialize-callback-func
 */
ini_set('unserialize_callback_func', 'spl_autoload_call');

// -- Configuration and initialization -----------------------------------------

/**
 * Set the default language
 */
I18n::lang('en-us');

/**
 * Set Kohana::$environment if a 'KOHANA_ENV' environment variable has been supplied.
 *
 * Note: If you supply an invalid environment name, a PHP warning will be thrown
 * saying "Couldn't find constant Kohana::<INVALID_ENV_NAME>"
 */
if (isset($_SERVER['KOHANA_ENV']))
{
    Kohana::$environment = constant('Kohana::'.strtoupper($_SERVER['KOHANA_ENV']));
}

/**
 * Initialize Kohana
 */
$init_config = include 'config/init.php';
Kohana::init($init_config);

/**
 * Attach a file reader to config. Multiple readers are supported.
 */
Kohana::$config->attach(new Config_File);

/**
 * Attach the file write to logging. Multiple writers are supported.
 */
Kohana::$log->attach(new Log_File(Kohana::$config->load('website')->get('log_path')));

/**
 * Enable modules. Modules are referenced by a relative or absolute path.
 */
Kohana::modules(array(
    // 'auth'         => MODPATH.'auth',         // Basic authentication
    // 'cache'        => MODPATH.'cache',        // Caching with multiple backends
    // 'codebench'    => MODPATH.'codebench',    // Benchmarking tool
    // 'database'     => MODPATH.'database',     // Database access
    // 'image'        => MODPATH.'image',        // Image manipulation
    // 'minion'       => MODPATH.'minion',       // CLI Tasks
    // 'orm'          => MODPATH.'orm',          // Object Relationship Mapping
    // 'unittest'     => MODPATH.'unittest',     // Unit testing
    // 'userguide'    => MODPATH.'userguide',    // User guide and API documentation
       'kostache'     => MODPATH.'kostache',     // Mustache templating
       'ko-errorpage' => MODPATH.'ko-errorpage', // Display custom 404 error pages
    // 'ko-cms'       => MODPATH.'ko-cms',       // CMS editor for template files
    ));

/**
 * Include default routes. Default routes are located in application/routes/default.php
 */
include Kohana::find_file('routes', 'default');

/**
 * Salt used for storing cookies for sessions
 */
Cookie::$salt = $init_config['cookiesalt'];

/**
 * Load composer dependencies
 */
if (file_exists(VENDORPATH.'autoload.php'))
{
    require_once VENDORPATH.'autoload.php';
}
