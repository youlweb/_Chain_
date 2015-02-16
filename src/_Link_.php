<?php

/**
 * _Chain_ ©2015 Julien <youlweb@hotmail.com>
 * Refer to the LICENSE file for the full copyright and license information.
 * @package chain/core
 */

namespace _Chain_;

/**
 * Link interface.
 *
 * Updates a visiting Input/Output object via an operation. Below is a template
 * for the Input/Output contract that should be included with every link.
 *
 * I/O contract
 * ------------
 * <pre>
 * I    string      Optional description.
 *      ...         as many inputs as needed.
 * O    number      Optional description.
 *      ...         as many outputs as needed.
 * X    yes/no      Breaks the chain if ...
 * </pre>
 *
 * @author Julien <youlweb@hotmail.com>
 */
interface _Link_
{
    /**
     * Checks if the link breaks the chain.
     *
     * @return bool
     */
    public function _X_();

    /**
     * Performs an operation on a visiting I/O object.
     *
     * @param I_O $IO
     * @param I_O $IO... More I/O visitors.
     * @return I_O
     */
    public function EXE(I_O $IO);
}