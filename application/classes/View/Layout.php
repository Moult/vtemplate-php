<?php
defined('SYSPATH') OR die('No direct script access.');

/**
 * Sets up partials, essentially a core file for KOstache.
 */
class View_Layout
{
    public $page_title = 'vtemplate';
    public $meta_description = 'Your default page description';
    public $meta_keywords = 'seo, keywords, go, here';

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
