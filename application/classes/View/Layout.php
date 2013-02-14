<?php
/**
 * vtemplate application/classes/View/Layout.php
 *
 * @package   View
 * @author    Dion Moult <dion@thinkmoult.com>
 * @copyright (c) 2013 Dion Moult
 * @license   ISC http://opensource.org/licenses/isc-license.txt
 */

defined('SYSPATH') OR die('No direct script access.');

/**
 * Sets up partials, essentially a core file for KOstache.
 *
 * @package View
 */
class View_Layout
{
    /**
     * The base URL of the website.
     *
     * @return string
     */
    public function baseurl()
    {
        return URL::base();
    }

    /**
     * The current page that we are on
     *
     * @return string
     */
    public function currenturl()
    {
        return $this->request->uri();
    }
}
