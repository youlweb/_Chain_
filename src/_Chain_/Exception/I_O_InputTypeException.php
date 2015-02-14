<?php

/**
 * Chain ©2015 Julien Tord <youlweb@hotmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\_Chain_\Exception;

use Exception;
use Jul\_Chain_\Type\TypeCheck;

/**
 * An input argument of an unexpected type is requested.
 *
 * @author Julien Tord <youlweb@hotmail.com>
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