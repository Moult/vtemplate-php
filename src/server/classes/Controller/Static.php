<?php
/**
 * vtemplate
 *
 * @license MIT
 */

defined('SYSPATH') OR die('No direct script access.');

/**
 * Shows static base pages of the website.
 */
class Controller_Static extends Controller_Core
{
    /**
     * Homepage of website.
     *
     * @return void
     */
    public function action_homepage()
    {}

    /**
     * Autoloads view templates which don't have a specific route setup
     *
     * @return void
     */
    public function action_loader()
    {
        $template_path = $this->request->param('template_path');
        if (Kohana::find_file('templates', $template_path, 'mustache'))
        {
            $this->view = new View_Layout;
            $this->template = $template_path;
        }
    }
}
