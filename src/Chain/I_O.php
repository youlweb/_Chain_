<?php

/**
 * Chain ©2015 Julien Tord <youlweb@hotmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Chain;

/**
 * I_O
 *
 * @author Julien Tord <youlweb@hotmail.com>
 */
class I_O implements I_O_Interface
{
    /**
     * @var array
     */
    private $_values;

    public function __construct()
    {
        $this->_values = func_get_args();
    }

    /** {@inheritDoc} */
    public function I($index = 0)
    {
        return $this->_values[$index];
    }

    /** {@inheritDoc} */
    public function O($output)
    {
        $this->_values = func_get_args();
        return $this;
    }
}