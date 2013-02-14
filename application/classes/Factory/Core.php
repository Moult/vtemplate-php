<?php
/**
 * vtemplate Factory/Core.php
 *
 * @package   Factory
 * @author    Dion Moult <dion@thinkmoult.com>
 * @copyright (c) 2013 Dion Moult
 * @license   ISC http://opensource.org/licenses/isc-license.txt
 */

defined('SYSPATH') OR die('No direct script access.');

/**
 * All context factories must extend this class.
 *
 * @package Factory
 */
abstract class Factory_Core
{
    /**
     * Stores input data the factory is given.
     * @var array
     */
    protected $data;

    /**
     * Stores data the factory is given to be used during production
     *
     * @param array $data The data to be used for production
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Loads available data.
     *
     * @param string $key The key of the data item to retrieve
     * @return mixed
     */
    protected function get_data($key)
    {
        if (isset($this->data[$key]))
            return $this->data[$key];
        else
            return NULL;
    }
}
