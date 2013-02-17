<?php
/**
 * vtemplate
 *
 * @license ISC http://opensource.org/licenses/isc-license.txt
 */

defined('SYSPATH') OR die('No direct script access.');

/**
 * Core controller. All other controllers must extend this one.
 */
abstract class Controller_Core extends Controller
{
    /**
     * Stores the view class object to render
     * @var View
     */
    protected $view;

    /**
     * Stores the template to render
     * @var string
     */
    protected $template = NULL;

    /**
     * Stores the view class name it tries to autoload
     * @var string
     */
    private $view_class_name;

    /**
     * Stores the name of the layout to use to render the view
     * @var string
     */
    protected $layout = 'layout';

    /**
     * Autoloads a view class into $this->view
     *
     * @return void
     */
    public function before()
    {
        $this->view = new stdClass;

        $this->view_class_name = "View_".ucfirst($this->request->controller()).'_'.ucfirst($this->request->action());

        if (Kohana::find_file('classes', str_replace('_', '/', $this->view_class_name)))
        {
            $this->view = new $this->view_class_name;
        }
    }

    /**
     * Renders the current view in $this->view
     *
     * @return void
     */
    public function after()
    {
        $this->view->request = $this->request;

        if (get_class($this->view) !== 'stdClass')
        {
            $renderer = Kostache_Layout::factory($this->layout);
            $this->response->body($renderer->render($this->view, $this->template));
        }
        else
            throw New HTTP_Exception_404('View '.$this->view_class_name.' not found.');
    }
}
