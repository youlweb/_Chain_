<?php

/**
 * Chain ©2015 Julien Tord <youlweb@hotmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\_Chain_\Exception;

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