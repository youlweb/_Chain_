<?php

/**
 * _Chain_ ©2015 Julien <youlweb@hotmail.com>
 * Refer to the LICENSE file for the full copyright and license information.
 * @package _chain_/_chain_
 */

namespace _Chain_\Operator;
use _Chain_\_AbsLink_;
use _Chain_\I_O;
use _Chain_\Type;

/**
 * Applies the XOR operator to a couple of booleans.
 *
 * I/O contract
 * ------------
 * <pre>
 * I    bool
 * I    bool
 * O    bool        Result of the XOR operation.
 * X    no
 * </pre>
 *
 * @author Julien Tord <youlweb@hotmail.com>
 */
class _XOR_ extends _AbsLink_
{
    /** {@inheritDoc} */
    public function EXE(I_O $IO)
    {
        return $IO->_O(
            $IO->I_(Type::BOOL) xor
            $IO->I_(Type::BOOL)
        );
    }
}