<?php

/**
 * _Chain_ ©2015 Julien <youlweb@hotmail.com>
 * Refer to the LICENSE file for the full copyright and license information.
 * @package chain/core
 */

namespace _Chain_\Operator;

use _Chain_\IO;
use _Chain_\Type;

/**
 * @author Julien <youlweb@hotmail.com>
 */
class _NOT_Test extends \PHPUnit_Framework_TestCase
{
    public function testEXE()
    {
        $NOT = new _NOT_();
        $IO = new IO(true, false);
        $NOT->EXE($IO);
        $this->assertFalse($IO->I_(Type::BOOL));
        $NOT->EXE($IO->_O(false, false, false));
        $this->assertTrue($IO->I_(Type::BOOL));
        $NOT->EXE($IO->_O(false, false, false, true));
        $this->assertFalse($IO->I_(Type::BOOL));
    }
}
