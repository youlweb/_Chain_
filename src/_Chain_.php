<?php

/**
 * _Chain_ ©2015 Julien <youlweb@hotmail.com>
 * Refer to the LICENSE file for the full copyright and license information.
 * @package chain/core
 */

namespace _Chain_;
use Iterator;

/**
 * A chain is an iterable composite collection of links.
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
     * If offset is not provided, the link is appended to the chain.
     * If offset is positive, the link is inserted at that offset from the
     * beginning of the chain.
     * If offset is negative then it's inserted that far from the end of
     * the chain.
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