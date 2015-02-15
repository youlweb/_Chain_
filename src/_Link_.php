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
     * Checks if link caused the chain to break.
     *
     * @return bool
     */
    public function _X_();

    /**
     * Performs an operation on a visiting I/O object.
     *
     * @param I_O $I_O
     * @param I_O $I_O... More I/O visitors.
     * @return I_O
     */
    public function EXE(I_O $I_O);
}