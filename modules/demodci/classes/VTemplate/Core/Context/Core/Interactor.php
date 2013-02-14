<?php

/**
 * vtemplate Context/Core/Interactor.php
 *
 * @package   Interactor
 * @author    Dion Moult <dion@thinkmoult.com>
 * @copyright (c) 2013 Omni Studios
 * @license   ISC http://opensource.org/licenses/isc-license.txt
 */

namespace VTemplate\Core\Context\Core;

/**
 * All context interactors should implement this
 *
 * @package Interactor
 */
interface Interactor
{
    /**
     * Carries out the interaction chain of the usecase.
     *
     * Does not catch exceptions.
     *
     * @return void
     */
    public function interact();

    /**
     * Runs the interaction chain, generating a results array
     *
     * Result array is in the format of:
     * array(
     *     'status' => 'success|failure',
     *     'type' => 'validation|authorisation|etc', # If failure
     *     'data' => array() #otional
     * );
     *
     * @return array
     */
    public function execute();
}
