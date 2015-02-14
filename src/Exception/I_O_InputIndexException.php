<?php

/**
 * _Chain_ ©2015 Julien <youlweb@hotmail.com>
 * Refer to the LICENSE file for the full copyright and license information.
 * @package _chain_/_chain_
 */

namespace _Chain_\Exception;
use Exception;

/**
 * An unavailable argument is requested.
 *
 * @author Julien Tord <youlweb@hotmail.com>
 */
class I_O_InputIndexException extends Exception implements I_O_Exception
{
    /**
     * @param int $index
     */
    public function __construct($index)
    {
        $this->message = 'The input requested at index ' . $index
            . ' is not available.';
    }
}