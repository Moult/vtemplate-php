<?php

/**
 * vtemplate Driver/Format.php
 *
 * @package   Driver
 * @author    Dion Moult <dion@thinkmoult.com>
 * @copyright (c) 2013 Dion Moult
 * @license   MIT
 */

/**
 * Driver for formatting text functionality
 *
 * Allows you to set a data object and it'll format it based on a defined
 * template.
 *
 * This uses KOstache.
 *
 * @package Driver
 */
class Driver_Formatter
{
    /**
     * Data object
     * @var Data
     */
    private $data;

    /**
     * Store a data object
     *
     * @param Data $data Data object with variables to format.
     * @return void
     */
    public function setup($data)
    {
        $this->data = $data;
    }

    /**
     * Formats the data object using a mustache template
     *
     * @param string $template The name of the template to use
     * @return string
     */
    public function format($template)
    {
        $view_name = 'View_'.$template;
        $view = new $view_name;
        $view->data = $this->data;

        $renderer = Kostache_Layout::factory('plain');
        return $renderer->render($view);
    }
}
