<?php
/**
 * vtemplate Context/Core/Factory.php
 *
 * @package   Context
 * @author    Dion Moult <dion@thinkmoult.com>
 * @copyright (c) 2013 Dion Moult
 * @license   ISC http://opensource.org/licenses/isc-license.txt
 */

namespace VTemplate\Core\Context\Core;

/**
 * All contexts should implement this.
 *
 * @package Context
 */
interface Factory
{
    /**
     * Fetches the context interactor
     *
     * @return Interactor
     */
    public function fetch();
}
