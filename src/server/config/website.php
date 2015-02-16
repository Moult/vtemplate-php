<?php defined('SYSPATH') OR die('No direct access allowed.');

$config = include('config.php');

return array(
    'cdn_url' => $config['website']['cdn_url'],
    'base_url' => $config['website']['base_url'],
    'log_path' => $config['website']['log_path'],
    'cache_path' => $config['website']['cache_path']
);
