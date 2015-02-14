<?php

/**
 * Chain ©2015 Julien Tord <youlweb@hotmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Chain;

use Jul\Chain\Type\Type;

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
class ANDGate implements Link
{
    /** {@inheritDoc} */
    public function exec(I_O $I_O)
    {
        $AND = $I_O->I_(Type::BOOL)
            && $I_O->I_(Type::BOOL);
        return $I_O->_O($AND);
    }
}