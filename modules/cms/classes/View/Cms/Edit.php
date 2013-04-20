<?php

/**
 * vtemplate View/Cms/Edit.php
 *
 * @package   View
 * @author    Dion Moult <dion@thinkmoult.com>
 * @copyright (c) 2013 Dion Moult
 * @license   MIT
 */

/**
 * CMS editing page
 *
 * @package View
 */
class View_CMS_Edit extends View_Layout
{
    /**
     * Stores the template content as a string
     * @var string
     */
    public $template_content;

    /**
     * Gets the editable page content markup as a string
     *
     * @return string
     */
    public function content_string()
    {
        $template_content = $this->template_content;

        $template_content = str_replace('{{', '&#123;&#123;', $template_content);
        $template_content = str_replace('}}', '&#125;&#125;', $template_content);
        return $template_content;
    }

    /**
     * Whether or not the page has been saved
     *
     * @return bool
     */
    public function page_saved()
    {
        if ($this->request->method() === HTTP_Request::POST AND ! isset($this->mustache_error))
            return TRUE;
        else
            return FALSE;
    }

    /**
     * Whether or not we show the editor
     *
     * @return bool
     */
    public function show_editor()
    {
        if ($this->request->param('template_path'))
            return TRUE;
        else
            return FALSE;
    }

    /**
     * Returns a list of page categories
     *
     * @return array
     */
    public function categories()
    {
        $config = Kohana::$config->load('cms');
        return $config->get('editable_pages');
    }
}
