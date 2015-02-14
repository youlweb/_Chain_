<?php

/**
 * _Chain_ ©2015 Julien <youlweb@hotmail.com>
 * Refer to the LICENSE file for the full copyright and license information.
 * @package chain/chain
 */

namespace _Chain_;

/**
 * Applies the AND operator to a couple of booleans.
 *
 * I/O contract
 * ------------
 * <pre>
 * I    bool
 * I    bool
 * /
 * O    bool    Result of the AND operation
 * </pre>
 *
 * @author Julien Tord <youlweb@hotmail.com>
 */
class _AND_ implements _Link_
{
    /** {@inheritDoc} */
    public function run(I_O $I_O)
    {
        $AND = $I_O->I_(Type::BOOL)
            && $I_O->I_(Type::BOOL);
        return $I_O->_O($AND);
    }
}