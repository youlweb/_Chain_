<?php

/**
 * _Chain_ ©2015 Julien <youlweb@hotmail.com>
 * Refer to the LICENSE file for the full copyright and license information.
 * @package chain/chain
 */

namespace _Chain_\Exception;
use _Chain_\TypeCheck;
use Exception;

/**
 * An input argument of an unexpected type is requested.
 *
 * @author Julien <youlweb@hotmail.com>
 */
class I_O_InputTypeException extends Exception implements I_O_Exception
{
    /**
     * @param int $index
     * @param int|string $expected_type
     * @param int|string $actual_type
     */
    public function __construct($index, $expected_type, $actual_type)
    {
        $this->message = 'The input requested at index ' . $index
            . ' must be of type ' . TypeCheck::literal($expected_type)
            . ', but is of type ' . TypeCheck::literal($actual_type)
            . ' instead.';
    }
}