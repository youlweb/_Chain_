<?php

/**
 * Chain ©2015 Julien Tord <youlweb@hotmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Chain;

use Jul\Chain\Exception\I_O_InputIndexException;

/**
 * {@inheritDoc}
 */
class I_O implements I_O_Interface
{
    /**
     * @var mixed[]
     */
    private $_values;

    /**
     * @param mixed $initial_value
     * @param mixed $initial_value,... Unlimited number of initial values.
     */
    public function __construct($initial_value)
    {
        $this->_values = func_get_args();
    }

    /** {@inheritDoc} */
    public function I_($index = 0)
    {
        if (!isset($this->_values[$index])) {
            throw new I_O_InputIndexException($index);
        }
        return $this->_values[$index];
    }

    /** {@inheritDoc} */
    public function _O($output)
    {
        $this->_values = func_get_args();
        return $this;
    }

    /** {@inheritDoc} */
    public function types()
    {
        return array_map(function ($value) {
            if (is_object($value)) {
                return get_class($value);
            }
            return Type::$PHP_TYPES[gettype($value)];

        }, $this->_values);
    }
}