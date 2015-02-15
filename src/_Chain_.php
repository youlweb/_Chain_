<?php

/**
 * _Chain_ ©2015 Julien <youlweb@hotmail.com>
 * Refer to the LICENSE file for the full copyright and license information.
 * @package chain/core
 */

namespace _Chain_;
use Iterator;

/**
 * A chain is a composite collection of links.
 *
 * An Input/Output visitor is passed through each link to update its state.
 * A chain is also a link, allowing it to be inserted in other chains.
 *
 * @author Julien <youlweb@hotmail.com>
 */
interface _Chain_ extends _Link_, Iterator
{
    /**
     * Inserts a link in the chain.
     *
     * @param _Link_ $link
     * @param int|null $offset Position where the link should be inserted.
     * @return self
     */
    public function ADD(_Link_ $link, $offset);

    /**
     * Returns a link from the chain.
     *
     * @param int $index The position of the link in the chain.
     * @return _Link_|null No exception is thrown if $index doesn't exist.
     */
    public function GET($index);
}