<?php

/**
 * Chain ©2015 Julien Tord <youlweb@hotmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Chain;

/**
 * IO
 *
 * @author Julien Tord <youlweb@hotmail.com>
 */
interface I_O_Interface
{
    /**
     * I is a getter.
     *
     * It returns the value memorized at a given index.
     * @param int $index
     * @return mixed
     */
    public function I($index = 0);

    /**
     * O is a setter.
     *
     * It memorizes a set of values and returns itself.
     * @param mixed $output
     * @param mixed $output,... unlimited number of output values.
     * @return self
     */
    public function O($output);
}