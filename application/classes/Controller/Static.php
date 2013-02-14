<?php
/**
 * vtemplate application/classes/Controller/Static.php
 *
 * @package   Controller
 * @author    Dion Moult <dion@thinkmoult.com>
 * @copyright (c) 2013 Dion Moult
 * @license   ISC http://opensource.org/licenses/isc-license.txt
 */

defined('SYSPATH') OR die('No direct script access.');

/**
 * Shows static base pages of the website.
 *
 * @package Controller
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
