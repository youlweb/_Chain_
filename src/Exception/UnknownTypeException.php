<?php

/**
 * _Chain_ ©2015 Julien <youlweb@hotmail.com>
 * Refer to the LICENSE file for the full copyright and license information.
 * @package chain/chain
 */

namespace _Chain_\Exception;
use Exception;

/**
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