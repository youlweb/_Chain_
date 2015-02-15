<?php

/**
 * _Chain_ ©2015 Julien <youlweb@hotmail.com>
 * Refer to the LICENSE file for the full copyright and license information.
 * @package chain/chain
 */

namespace _Chain_;

/**
 * Link interface.
 *
 * Updates a visiting Input/Output object via an operation.
 *
 * @author Julien Tord <youlweb@hotmail.com>
 */
interface _Link_
{
    /**
     * Checks if the execution of the chain should come to a halt.
     *
     * @return bool
     */
    public function isHalt();

    /**
     * Performs an operation on a visiting I/O object.
     *
     * @param I_O $I_O
     * @param I_O $I_O... More I/O visitors.
     * @return I_O
     */
    public function run(I_O $I_O);
}