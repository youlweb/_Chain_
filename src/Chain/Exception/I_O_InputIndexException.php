<?php

/**
 * Chain ©2015 Julien Tord <youlweb@hotmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Chain\Exception;

use Exception;

/**
 * I/O input index exception
 *
 * The I/O visitor is asked to return an unknown input.
 *
 * @author Julien Tord <youlweb@hotmail.com>
 */
class I_O_InputIndexException extends Exception
{
    /**
     * @param integer $index
     */
    public function __construct($index)
    {
        $this->message = 'The input at index ' . $index . ' is not found.';
    }
}