<?php

/**
 * Chain ©2015 Julien Tord <youlweb@hotmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace _Chain_;

/**
 * A chain is a collection of links.
 *
 * An Input/Output visitor is passed through each link to update its state.
 * A chain is also a link, allowing it to be inserted in other chains.
 *
 * @author Julien Tord <youlweb@hotmail.com>
 */
interface _Chain_ extends _Link_
{
    /**
     * Append a link to the chain.
     *
     * @param _Link_ $link
     * @return self
     */
    public function _link(_Link_ $link);

    /**
     * Prepend a link to the chain.
     *
     * @param _Link_ $link
     * @return self
     */
    public function link_(_Link_ $link);
}