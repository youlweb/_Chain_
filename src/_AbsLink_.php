<?php

/**
 * _Chain_ ©2015 Julien <youlweb@hotmail.com>
 * Refer to the LICENSE file for the full copyright and license information.
 * @package _chain_/_chain_
 */

namespace _Chain_;

/**
 * Abstract link.
 *
 * This class can be extended to avoid implementing the chain-breaking
 * operation _X_(), since it should return FALSE in most cases.
 * The protected variable $_X_ can be set to true shall the need to break
 * the chain arise.
 *
 * @author Julien <youlweb@hotmail.com>
 */
abstract class _AbsLink_ implements _Link_
{
    /**
     * @var bool
     */
    protected $_X_ = false;

    /** {@inheritDoc} */
    public function _X_()
    {
        return $this->_X_;
    }
}