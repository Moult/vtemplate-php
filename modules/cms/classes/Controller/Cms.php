<?php

/**
 * vtemplate Controller/CMS.php
 *
 * @package   Controller
 * @author    Dion Moult <dion@thinkmoult.com>
 * @copyright (c) 2013 Dion Moult
 * @license   MIT
 */

/**
 * Delivers the CMS module
 *
 * @package Controller
 */
class Controller_CMS extends Controller_Core
{
    /**
     * The editing page
     *
     * @return void
     */
    public function action_edit()
    {
        // Define the view we are using
        $this->layout = 'cms';
        $this->template = 'Cms/Edit';

        // Are we editing a file?
        $template_path = $this->request->param('template_path');

        $template_file = Kohana::find_file('templates', $template_path, 'mustache');
        if ( ! empty($template_file))
        {
            $template_content = file_get_contents($template_file);
            $this->view->template_content = $template_content;
        }
        elseif ( ! empty($template_path))
            throw HTTP_Exception::factory(404, 'Template not found');

        if ($this->request->method() === HTTP_Request::POST)
        {
            $content_string = $this->request->post('content_string');

            // Check to make sure they haven't broken any existing mustache setups
            preg_match_all('/\{\{[#\/^]*?.*?\}\}/', $template_content, $current_mustaches);
            preg_match_all('/\{\{[#\/^]*?.*?\}\}/', $content_string, $proposed_mustaches);

            if ($current_mustaches === $proposed_mustaches)
            {
                // Do HTML Tidy preprocessing
                $tidy_config = array(
                    'doctype' => 'omit',
                    'drop-empty-paras' => TRUE,
                    'fix-backslash' => TRUE,
                    'fix-uri' => TRUE,
                    'break-before-br' => TRUE,
                    'show-body-only' => TRUE,
                    'logical-emphasis' => TRUE,
                    'indent' => TRUE,
                    'indent-spaces' => 4,
                    'vertical-space' => TRUE,
                    'wrap' => 80
                );

                $tidy = new tidy;
                $tidy->parseString($content_string, $tidy_config);
                $tidy->cleanRepair();
                $tidy_string = (string) $tidy;

                // Let's do custom preprocessing
                // Remove blank spaces
                $tidy_string = str_replace('&nbsp;', '', $tidy_string);
                $tidy_string = str_replace('&#160;', '', $tidy_string);
                $tidy_string = preg_replace('/<[a-z]* style=".*">(\{\{[#\/^].*\}\})<\/[a-z]*>/i', '${1}', $content_string);

                file_put_contents($template_file, (string) $tidy_string);

                $this->view->template_content = $tidy_string;
            }
            else
            {
                $this->view->mustache_error = TRUE;
            }

        }
    }
}
