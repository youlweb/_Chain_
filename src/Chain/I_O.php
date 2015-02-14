<?php

/**
 * Chain ©2015 Julien Tord <youlweb@hotmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Chain;

use Jul\Chain\Exception\I_O_Exception;

/**
 * Input/Output interface.
 *
 * Carries the result of link operations through the chain. The state of this
 * visitor object is altered by each link it traverses.
 *
 * @author Julien Tord <youlweb@hotmail.com>
 */
interface I_O
{
    /**
     * Successively returns each internal value as an input argument.
     *
     * @param int $type A type constant or FQCDN string.
     * @param bool $optional Signal an optional argument.
     * @return mixed An input value.
     * @throws I_O_Exception If a mandatory argument is missing.
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