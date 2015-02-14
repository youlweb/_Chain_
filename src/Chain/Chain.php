<?php

/**
 * Chain ©2015 Julien Tord <youlweb@hotmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Chain;

/**
 * A chain is a collection of links.
 *
 * An Input/Output visitor is passed through each link to update its state.
 * A chain is also a link, allowing it to be inserted in other chains.
 *
 * @author Julien Tord <youlweb@hotmail.com>
 */
interface Chain extends Link
{
    /**
     * Append a link to the chain.
     *
     * @param Link $link
     * @return self
     */
    public function link(Link $link);

    /**
     * Runs the I/O through the chain, and returns its final state.
     *
     * @param I_O $I_O An I/O visitor.
     * @return mixed|array
     */
    public function result(I_O $I_O);
}