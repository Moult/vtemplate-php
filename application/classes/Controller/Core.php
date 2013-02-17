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
        {
            throw New HTTP_Exception_404('View '.$this->view_class_name.' not found.');
        }
    }

    /**
     * Sends data to a factory to produce a context and executes it
     *
     * @param  array $data    The data to send to the factory
     * @param string $factory The name of the factory to use, if not given, a
     *                        factory name is guessed
     * @return array The results of the context execution in the format of:
     *               array(
     *                   'status' => 'success' / 'failure',
     *                   'type' => optional string denoting type of status,
     *                   'data' => optional array of relevant data,
     *               )
     */
    protected function execute_context($data = NULL, $factory = NULL)
    {
        $context = $this->factory($data, $factory)->fetch();
        $interactor = $context->fetch();
        return $interactor->execute();
    }

    /**
     * Attempts to guess a factory to load either from URI or from param
     *
     * @param array  $data    The data to send to the factory
     * @param string $factory Name of factory to load.
     * @return Context_Core A "Context_Core" subclass object.
     */
    private function factory($data = NULL, $factory = NULL)
    {
        if ($factory === NULL)
            return $this->_factory($data, $this->guess_factory_name_from_uri());
        else
            return $this->_factory($data, $factory);
    }

    /**
     * Guesses the factory name from the URI.
     *
     * @return string
     */
    private function guess_factory_name_from_uri()
    {
        return 'Factory_'.ucfirst($this->request->controller()).'_'.ucfirst($this->request->action());
    }

    /**
     * Loads a factory.
     *
     * @param array  $data    The data to send to the factory
     * @param string $factory Name of the factory class.
     * @return Factory depending on param $factory
     */
    private function _factory($data, $factory)
    {
        if ( ! class_exists($factory))
            throw New HTTP_Exception_404('Factory '.$factory.' not found.');

        return new $factory($data);
    }
}
