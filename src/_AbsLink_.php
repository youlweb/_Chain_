<?php

/**
 * _Chain_ ©2015 Julien <youlweb@hotmail.com>
 * Refer to the LICENSE file for the full copyright and license information.
 * @package chain/core
 */

namespace _Chain_;

/**
 * Abstract link.
 *
 * This class can be extended to avoid implementing the chain-breaking
 * operation _X_(), since it should return FALSE in most cases.
 * Link parent operations are also implemented.
 *
 * @author Julien <youlweb@hotmail.com>
 */
abstract class _AbsLink_ implements _Link_
{
    /**
     * @var bool
     */
    private $_break = false;

    /**
     * @var _Chain_
     */
    private $_chain;

    /** {@inheritDoc} */
    public function _X_($break = null)
    {
        if (null !== $break) {
            $this->_break = $break;
        }
        return $this->_break;
    }

    /** {@inheritDoc} */
    public function getParent()
    {
        return $this->_chain;
    }

    /** {@inheritDoc} */
    public function setParent(_Chain_ $chain)
    {
        $this->_chain = $chain;
        return $this;
    }
}