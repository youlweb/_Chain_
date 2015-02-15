<?php

/**
 * _Chain_ ©2015 Julien <youlweb@hotmail.com>
 * Refer to the LICENSE file for the full copyright and license information.
 * @package _chain_/_chain_
 */

namespace _Chain_;

/**
 * Abstract link
 *
 * @author Julien Tord <youlweb@hotmail.com>
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