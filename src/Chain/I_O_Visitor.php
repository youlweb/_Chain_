<?php

/**
 * Chain ©2015 Julien Tord <youlweb@hotmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Chain;

use Jul\Chain\Exception\I_O_InputIndexException;
use Jul\Chain\Exception\I_O_InputTypeException;

/**
 * Input/Output
 *
 * The state of this visitor object is altered by each link it traverses.
 *
 * @author Julien Tord <youlweb@hotmail.com>
 */
class I_O_Visitor implements I_O
{
    /**
     * @var integer
     */
    private $_index = 0;

    /**
     * @var integer[]
     */
    private $_types;

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
        if (!$this->isRightType($type)) {
            throw new I_O_InputTypeException($this->_index, $type, $this->_types[$this->_index]);
        }
        $value = $this->_values[$this->_index];
        ++$this->_index;
        return $value;
    }

    /** {@inheritDoc} */
    public function _O($output)
    {
        $this->_values = func_get_args();
        return $this;
    }

    /**
     * Check expected input type against actual
     *
     * @param int|string $expected_type Type to check against.
     * @return bool
     */
    private function isRightType($expected_type)
    {
        $actual = $this->typeOf($this->_index);
        if ($expected_type === $actual) {
            return true;
        }
        if (is_integer($actual)) {
            return false;
        }
        if (is_a($actual, $expected_type)) {
            return true;
        }
        return in_array($expected_type, class_implements($actual));
    }

    /**
     * Return the data type at the given index.
     *
     * @param int $index
     * @return int|string
     */
    private function typeOf($index)
    {
        $value = $this->_values[$index];
        if (is_object($value)) {
            return get_class($value);
        }
        return Type::$PHP[gettype($value)];
    }
}