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
class _AND_Test extends \PHPUnit_Framework_TestCase
{
    public function testEXE()
    {
        $AND = new _AND_();
        $IO = new IO(true, false);
        $AND->EXE($IO);
        $this->assertFalse($IO->I_(Type::BOOL));
        $AND->EXE($IO->_O(true, true, true, true));
        $this->assertTrue($IO->I_(Type::BOOL));
        $AND->EXE($IO->_O(true, true, false, true));
        $this->assertFalse($IO->I_(Type::BOOL));
    }
}
