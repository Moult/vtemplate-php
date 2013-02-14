<?php
/**
 * vtemplate Factory/Interface.php
 *
 * @package   Factory
 * @author    Dion Moult <dion@thinkmoult.com>
 * @copyright (c) 2013 Dion Moult
 * @license   ISC http://opensource.org/licenses/isc-license.txt
 */

defined('SYSPATH') OR die('No direct script access.');

/**
 * All factories should implement this
 *
 * @package Factory
 */
interface Factory_Interface
{
    /**
     * Fetches the context class with all of its necessary dependencies.
     */
    public function fetch();
}
