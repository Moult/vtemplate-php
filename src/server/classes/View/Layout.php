<?php

/**
 * Sets up partials, essentially a core file for KOstache.
 */
class View_Layout
{
    public $page_title = 'Page Title';
    public $meta_description = 'Your default page description';

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
