<?php defined('SYSPATH') OR die('No direct script access.');

/**
 * Set the routes. Each route must have a minimum of a name, a URI and a set of
 * defaults for the URI.
 */
Route::set('homepage', '')
    ->defaults(array(
        'controller' => 'static',
        'action'     => 'homepage',
    ));

/**
 * CMS module routes
 */
/*
Route::set('cms', 'cms')
    ->defaults(array(
        'controller' => 'cms',
        'action'     => 'dashboard'
    ));

Route::set('cms editor', 'cms/edit(/<template_path>)', array('template_path' => '.*'))
    ->defaults(array(
        'controller' => 'cms',
        'action'     => 'edit',
    ));
 */

/**
 * Static page autoloader
 */
Route::set('default', '(<template_path>)', array('template_path' => '.*'))
    ->defaults(array(
        'controller' => 'static',
        'action'     => 'loader',
    ));
