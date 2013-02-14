<?php
/**
 * vtemplate Exception/Authorisation.php
 *
 * @package   Exception
 * @author    Dion Moult <dion@thinkmoult.com>
 * @copyright (c) 2013 Dion Moult
 * @license   ISC http://opensource.org/licenses/isc-license.txt
 */

namespace VTemplate\Core\Exception;

/**
 * For exceptions that need to log an array rather than a single message
 *
 * throw new Exception_Multiple_Subclass(array());
 * catch (Exception_Multiple_Subclass $e) {
 *     $issues = $e->as_array();
 * }
 *
 * @package Exception
 */
class Multiple extends \Exception
{
    /**
     * Holds the array of exception error messages
     */
    public $errors = array();

    /**
     * Stores the array of exception messages
     *
     * @param array $errors An array of exception messages
     * @return void
     */
    public function __construct(array $errors)
    {
        $this->errors = $errors;
    }

    /**
     * Returns all of the errors
     *
     * @return array
     */
    public function get_errors()
    {
        return $this->errors;
    }
}
