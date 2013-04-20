<?php
defined('SYSPATH') OR die('No direct script access.');

/**
 * Sets up partials, essentially a core file for KOstache.
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
