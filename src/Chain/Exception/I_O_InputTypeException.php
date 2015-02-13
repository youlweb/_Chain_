<?php

/**
 * Chain ©2015 Julien Tord <youlweb@hotmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Chain\Exception;

use Exception;
use Jul\Chain\Type;

/**
 * I/O input type exception
 *
 * An input type requested by a link does not match.
 *
 * @author Julien Tord <youlweb@hotmail.com>
 */
class I_O_InputTypeException extends Exception implements I_O_ExceptionInterface
{
    /**
     * @param integer $index
     * @param int|string $expected_type
     * @param int|string $actual_type
     */
    public function __construct($index, $expected_type, $actual_type)
    {
        $expected_type_literal = is_integer($expected_type) ? Type::$LITERAL[$expected_type] : $expected_type;
        $actual_type_literal = is_integer($actual_type) ? Type::$LITERAL[$actual_type] : $actual_type;
        $this->message = 'Requested input argument number ' . $index . ' must be of type ' . $expected_type_literal . ', got ' . $actual_type_literal;
    }
}