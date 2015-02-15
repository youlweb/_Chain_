<?php

/**
 * _Chain_ ©2015 Julien <youlweb@hotmail.com>
 * Refer to the LICENSE file for the full copyright and license information.
 * @package chain/chain
 */

namespace _Chain_\Example;

use _Chain_\_AbsLink_;
use _Chain_\I_O;
use _Chain_\Type;

/**
 * Applies the AND operator to a couple of booleans.
 *
 * The abstract link class provides the _X_() operation that should always
 * return FALSE, unless an aspect of the link requires to break a chain.
 *
 * I/O contract
 * ------------
 * <pre>
 * I    bool
 * I    bool
 * O    bool        Result of the AND operation.
 * X    no
 * </pre>
 *
 * @author Julien Tord <youlweb@hotmail.com>
 */
class _AND_ extends _AbsLink_
{
    /** {@inheritDoc} */
    public function EXE(I_O $I_O)
    {
        $AND = $I_O->I_(Type::BOOL)
            && $I_O->I_(Type::BOOL);
        return $I_O->_O($AND);
    }
}