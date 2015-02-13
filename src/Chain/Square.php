<?php

/**
 * Chain ©2015 Julien Tord <youlweb@hotmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Chain;

/**
 * Square
 *
 * @author Julien Tord <youlweb@hotmail.com>
 */
class Square implements LinkInterface
{
    /** {@inheritDoc} */
    public function exec(I_O_Interface $I_O)
    {
        $value = $I_O->I_(Type::FLOAT);
        $power = $I_O->I_(Type::FLOAT, true);
        return $I_O->_O(pow($value, $power !== null ? $power : 2));
    }
}