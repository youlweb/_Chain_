<?php

/**
 * Chain ©2015 Julien Tord <youlweb@hotmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Chain;

/**
 * Division
 *
 * @author Julien Tord <youlweb@hotmail.com>
 */
class Division implements LinkInterface
{
    /** {@inheritDoc} */
    public function exec(I_O $I_O)
    {
        $numerator = $I_O->I_(Type::NUMBER);
        $denominator = $I_O->I_(Type::NUMBER);
        $precision = $I_O->I_(Type::NUMBER, true);
        $result = $numerator / $denominator;
        if (null !== $precision) {
            $result = round($result, $precision);
        }
        return $I_O->_O($result);
    }
}