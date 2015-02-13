<?php

/**
 * Chain ©2015 Julien Tord <youlweb@hotmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Chain\Exception;

use Exception;

/**
 * Unknown type exception
 *
 * A type constant or FQCN is not valid.
 *
 * @author Julien Tord <youlweb@hotmail.com>
 */
class UnknownTypeException extends Exception implements TypeException
{
    public function __construct()
    {
        $this->message = 'Type constant or FQCN not recognized.';
    }
}