<?php

/**
 * Chain ©2015 Julien Tord <youlweb@hotmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Chain;

/**
 * Chain
 *
 * Pass an I/O visitor through a collection of links.
 *
 * @author Julien Tord <youlweb@hotmail.com>
 */
interface ChainInterface extends LinkInterface
{
    /**
     * Returns an output value from the last link in the chain.
     *
     * @param I_O_Interface $I_O
     * @param integer $index
     * @return mixed
     */
    public function get(I_O_Interface $I_O, $index = 0);

    /**
     * Append a link to the chain.
     *
     * @param LinkInterface $link
     * @return self
     */
    public function link(LinkInterface $link);
}