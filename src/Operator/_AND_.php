<?php

/**
 * _Chain_ ©2015 Julien <youlweb@hotmail.com>
 * Refer to the LICENSE file for the full copyright and license information.
 * @package chain/core
 */

namespace _Chain_\Example;

use _Chain_\_AbsLink_;
use _Chain_\Exception\I_O_InputIndexException;
use _Chain_\I_O;
use _Chain_\Type;

/**
 * Applies the AND operator to all inputs.
 *
 * I/O contract
 * ------------
 * <pre>
 * I    bool
 * I    bool
 * O    bool        Result of the AND operation.
 * X    no
 * </pre>
 *
 * @author Julien <youlweb@hotmail.com>
 */
class _AND_ extends _AbsLink_
{
    /** {@inheritDoc} */
    public function EXE(I_O $IO)
    {
        while (true) {
            try {
                if (false === $IO->I_(Type::BOOL)) {
                    return $IO->_O(false);
                }
            } catch (I_O_InputIndexException $e) {
                break;
            }
        }
        return $IO->_O(true);
    }
}