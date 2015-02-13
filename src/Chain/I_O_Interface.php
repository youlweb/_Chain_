<?php

/**
 * Chain ©2015 Julien Tord <youlweb@hotmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Chain;

use Jul\Chain\Exception\I_O_ExceptionInterface;

/**
 * Input/Output
 *
 * The state of this visitor object is altered by each link it traverses.
 *
 * @author Julien Tord <youlweb@hotmail.com>
 */
interface I_O_Interface
{
    /**
     * Returns part of the internal state as an input argument.
     *
     * @param integer $index The index of the argument to retrieve.
     * @return mixed An internal state value.
     * @throws I_O_ExceptionInterface If no input is found at the given index.
     */
    public function I_($index = 0);

    /**
     * Updates the internal state and returns itself.
     *
     * @param mixed $value
     * @param mixed $value,... More output values.
     * @return self
     */
    public function _O($value);

    /**
     * Returns the types of all internal elements.
     *
     * @return string[]
     */
    public function types();
}