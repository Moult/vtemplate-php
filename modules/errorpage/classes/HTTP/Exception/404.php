<?php
/**
 * vtemplate  modules/classes/HTTP/Exception/404.php
 *
 * @package   Exception
 * @author    Dion Moult <dion@thinkmoult.com>
 * @copyright (c) 2013 Dion Moult
 * @license   MIT
 */

/**
 * Catches and deals with HTTP_Exception_404 exceptions
 *
 * @package Exception
 */
class HTTP_Exception_404 extends Kohana_HTTP_Exception_404 {

    /**
     * Show the user a nice 404 page.
     *
     * @return Response
     */
    public function get_response()
    {
        $view = new View_Error_404;
        $renderer = Kostache_Layout::factory('plain');
        $response = Response::factory()->status(404);
        $response->body($renderer->render($view));

        return $response;
    }
}
