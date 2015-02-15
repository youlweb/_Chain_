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
    protected $_halt = false;

    /** {@inheritDoc} */
    public function isHalt()
    {
        return $this->_halt;
    }
}