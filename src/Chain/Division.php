<?php

/**
 * Chain ©2015 Julien Tord <youlweb@hotmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Chain;

/**
 * Example with a division.
 *
 * @author Julien Tord <youlweb@hotmail.com>
 */
class Division implements LinkInterface
{
    const NUMERATOR = 0;
    const DENOMINATOR = 1;

    /** {@inheritDoc} */
    public static function exec(I_O_Interface $I_O)
    {
        $result = $I_O->I(self::NUMERATOR) / $I_O->I(self::DENOMINATOR);

        return $I_O->O($result);
    }
}