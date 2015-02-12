<?php

/**
 * Chain ©2015 Julien Tord <youlweb@hotmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Chain;

/**
 * Link
 *
 * @author Julien Tord <youlweb@hotmail.com>
 */
interface LinkInterface
{
    /**
     * Processes the input and returns the resulting output.
     *
     * @param I_O_Interface $I_O
     * @return I_O_Interface
     */
    public function exec(I_O_Interface $I_O);
}