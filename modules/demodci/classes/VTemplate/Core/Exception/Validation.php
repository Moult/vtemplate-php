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
 * When validation fails in a usecase execution
 *
 * throw new Exception_Validation($validation_instance->errors());
 *
 * @package Exception
 */
class Validation extends Multiple {}
