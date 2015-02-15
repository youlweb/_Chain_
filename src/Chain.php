<?php

/**
 * _Chain_ ©2015 Julien <youlweb@hotmail.com>
 * Refer to the LICENSE file for the full copyright and license information.
 * @package chain/core
 */

namespace _Chain_;

/**
 * A chain is a composite collection of links.
 *
 * An Input/Output visitor is passed through each link to update its state.
 * A chain is also a link, allowing it to be inserted in other chains.
 *
 * @author Julien <youlweb@hotmail.com>
 */
class Chain extends _AbsLink_ implements _Chain_
{
    /**
     * @var int
     */
    private $_index = 0;

    /**
     * @var _Link_[]
     */
    private $_links = [];

    /** {@inheritDoc} */
    public function ADD(_Link_ $link, $offset = null)
    {
        if (null === $offset) {
            $this->_links[] = $link;
        } else {
            array_splice($this->_links, $offset, 0, [$link]);
        }
        return $this;
    }

    /** {@inheritDoc} */
    public function EXE(I_O $I_O)
    {
        foreach ($this as $link) {
            $link->EXE($I_O);
            if ($link->_X_()) {
                break;
            }
        }
        return $I_O;
    }

    /** {@inheritDoc} */
    public function GET($index)
    {
        if (!isset($this->_links[$index])) {
            return null;
        }
        return $this->_links[$index];
    }

    /** {@inheritDoc} */
    public function current()
    {
        return $this->_links[$this->_index];
    }

    /** {@inheritDoc} */
    public function key()
    {
        return $this->_index;
    }

    /** {@inheritDoc} */
    public function next()
    {
        ++$this->_index;
    }

    /** {@inheritDoc} */
    public function rewind()
    {
        $this->_index = 0;
    }

    /** {@inheritDoc} */
    public function valid()
    {
        return isset($this->_links[$this->_index]);
    }
}