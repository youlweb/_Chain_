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
class _OR_Test extends \PHPUnit_Framework_TestCase
{
    public function testRun()
    {
        $OR = new _OR_();
        $IO = new IO(true, false);
        $OR->EXE($IO);
        $this->assertTrue($IO->I_(Type::BOOL));
        $OR->EXE($IO->_O(false, false, true, false));
        $this->assertTrue($IO->I_(Type::BOOL));
        $OR->EXE($IO->_O(false, false, false, false));
        $this->assertFalse($IO->I_(Type::BOOL));
    }
}
