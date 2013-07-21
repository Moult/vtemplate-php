<?php

defined('SYSPATH') OR die('No direct script access.');

return array(
    'smtp' => array(
        'host' => 'domain.com',
        'port' => 25,
        'username' => 'username',
        'password' => 'password',
        'ssl' => FALSE
    ),
    'default_to' => array(
        'postmaster@website.com' => 'Postmaster'
    ),
    'default_from' => array(
        'noreply@website.com' => 'Website'
    )
);
