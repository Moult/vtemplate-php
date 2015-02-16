<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * Initialize Kohana, setting the default options.
 *
 * The following options are available:
 *
 * - string   base_url    path, and optionally domain, of your application   NULL
 * - string   index_file  name of your index file, usually "index.php"       index.php
 * - string   charset     internal character set used for input and output   utf-8
 * - string   cache_dir   set the internal cache directory                   APPPATH/cache
 * - integer  cache_life  lifetime, in seconds, of items cached              60
 * - boolean  errors      enable or disable error handling                   TRUE
 * - boolean  profile     enable or disable internal profiling               TRUE
 * - boolean  caching     enable or disable internal caching                 FALSE
 * - boolean  expose      set the X-Powered-By header                        FALSE
 */

$config = include('config.php');

return array(
    'base_url'   => '/'.$config['website']['subdir'],
    'index_file' => '',
    'charset'    => 'utf-8',
    'errors'     => (bool) FALSE,
    'profile'    => (bool) $config['website']['enable_profiling'],
    'caching'    => (bool) $config['website']['enable_caching'],
    'cache_dir'  => $config['website']['cache_path'],
    'cookiesalt' => $config['website']['cookiesalt']
);
