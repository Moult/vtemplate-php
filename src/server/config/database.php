<?php defined('SYSPATH') OR die('No direct access allowed.');

$config = include('config.php');

return array(
    'default' => array(
        'type'       => 'PDO',
        'connection' => array(
            /**
             * The following options are available for PDO:
             *
             * string   dsn         Data Source Name
             * string   username    database username
             * string   password    database password
             * boolean  persistent  use persistent connections?
             */
            'dsn'        => 'mysql:host='.$config['database']['host'].';dbname='.$config['database']['name'],
            'username'   => $config['database']['username'],
            'password'   => $config['database']['password'],
            'persistent' => FALSE,
        ),
        /**
         * The following extra options are available for PDO:
         *
         * string   identifier  set the escaping identifier
         */
        'table_prefix' => '',
        'charset'      => 'utf8',
        'caching'      => FALSE,
    )
);
