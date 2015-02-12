<?php

/**
 * Chain ©2015 Julien Tord <youlweb@hotmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Chain;

/**
 * Example with square.
 *
 * @author Julien Tord <youlweb@hotmail.com>
 */
class Square implements LinkInterface
{
    /** {@inheritDoc} */
    public static function exec(I_O_Interface $I_O)
    {
        $result = pow($I_O->I(), 2);

        return $I_O->O($result);
    }
}