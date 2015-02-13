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
interface I_O
{
    /**
     * Successively returns each internal value as an input argument.
     *
     * @param integer $type A type constant.
     * @param bool $optional
     * @return mixed An internal state value.
     * @throws I_O_ExceptionInterface If a mandatory argument is missing,
     * or in case of a type mismatch.
     */
    public function I_($type, $optional = false);

    /**
     * Updates the internal values and returns itself.
     *
     * @param mixed $value
     * @param mixed $value,... More output values.
     * @return self
     */
    public function _O($value);
}