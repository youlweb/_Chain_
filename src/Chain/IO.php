<?php

/**
 * Chain ©2015 Julien Tord <youlweb@hotmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Chain;

use Jul\Chain\Exception\I_O_InputIndexException;
use Jul\Chain\Exception\I_O_InputTypeException;
use Jul\Chain\Type\TypeCheck;

/**
 * Concrete Input/Output visitor.
 *
 * Carries the result of link operations through the chain. The state of this
 * visitor object is altered by each link it traverses.
 *
 * @author Julien Tord <youlweb@hotmail.com>
 */
class IO implements I_O
{
    /**
     * @var integer
     */
    private $_index = 0;

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
    public function I_($type, $optional = false)
    {
        if (!$optional && !isset($this->_values[$this->_index])) {
            throw new I_O_InputIndexException($this->_index);
        }
        $value = $this->_values[$this->_index];
        $actual_type = TypeCheck::typeOf($value);
        if (!TypeCheck::isCompatible($type, TypeCheck::typeOf($value))) {
            throw new I_O_InputTypeException($this->_index, $type, $actual_type);
        }
        ++$this->_index;
        return $value;
    }

    /** {@inheritDoc} */
    public function _O($output)
    {
        $this->_values = func_get_args();
        $this->_index = 0;
        return $this;
    }
}