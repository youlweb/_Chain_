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
class _XOR_Test extends \PHPUnit_Framework_TestCase
{
    public function testEXE()
    {
        $XOR = new _XOR_();
        $IO = new IO(true, false);
        $XOR->EXE($IO);
        $this->assertTrue($IO->I_(Type::BOOL));
        $XOR->EXE($IO->_O(true,true));
        $this->assertFalse($IO->I_(Type::BOOL));
        $XOR->EXE($IO->_O(false, false));
        $this->assertFalse($IO->I_(Type::BOOL));
    }
}
