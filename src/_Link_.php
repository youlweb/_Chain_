<?php

/**
 * _Chain_ ©2015 Julien <youlweb@hotmail.com>
 * Refer to the LICENSE file for the full copyright and license information.
 * @package chain/core
 */

namespace _Chain_;

/**
 * A link updates a visiting Input/Output object via an EXE() operation.
 *
 * @author Julien <youlweb@hotmail.com>
 */
interface _Link_
{
    /**
     * Checks if the link breaks the chain if no argument is provided.
     *
     * If an argument is provided, it determines the status of _X_().
     *
     * @param bool $break
     * @return bool
     */
    public function _X_($break = null);

    /**
     * Performs an operation on a visiting I/O object.
     *
     * Below is a template for the Input/Output contract that should be
     * present in the PHP doc of every link's EXE() method.
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
     * @param I_O $IO
     * @param I_O $IO ... More I/O visitors.
     * @return I_O
     */
    public function EXE(I_O $IO);
}