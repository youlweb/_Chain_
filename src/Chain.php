<?php

/**
 * _Chain_ ©2015 Julien <youlweb@hotmail.com>
 * Refer to the LICENSE file for the full copyright and license information.
 * @package chain/chain
 */

namespace _Chain_;

/**
 * A chain is a collection of links.
 *
 * An Input/Output visitor is passed through each link to update its state.
 * A chain is also a link, allowing it to be inserted in other chains.
 *
 * @author Julien <youlweb@hotmail.com>
 */
class Chain extends _AbsLink_
{
    /**
     * @var _Link_[]
     */
    private $_links = [];

    /** {@inheritDoc} */
    public function halt()
    {
        return false;
    }

    /** {@inheritDoc} */
    public function _link(_Link_ $link)
    {
        $this->_links[] = $link;
        return $this;
    }

    /** {@inheritDoc} */
    public function link_(_Link_ $link)
    {
        array_unshift($this->_links, $link);
        return $this;
    }

    /** {@inheritDoc} */
    public function links()
    {
        return $this->_links;
    }

    /** {@inheritDoc} */
    public function EXE(I_O $I_O)
    {
        foreach ($this->_links as $link) {
            $link->EXE($I_O);
            if ($link->_X_()) {
                break;
            }
        }
        return $I_O;
    }
}