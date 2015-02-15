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
            array_splice($this->_links, $offset, 0, $link);
        }
        return $this;
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

    /** {@inheritDoc} */
    public function GET($index)
    {
        if (!$this->_links[$index]) {
            return null;
        }
        return $this->_links[$index];
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     */
    public function current()
    {
        // TODO: Implement current() method.
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     */
    public function key()
    {
        // TODO: Implement key() method.
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     */
    public function next()
    {
        // TODO: Implement next() method.
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     */
    public function rewind()
    {
        // TODO: Implement rewind() method.
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     */
    public function valid()
    {
        // TODO: Implement valid() method.
    }
}