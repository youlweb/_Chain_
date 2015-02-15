<?php

/**
 * _Chain_ ©2015 Julien <youlweb@hotmail.com>
 * Refer to the LICENSE file for the full copyright and license information.
 * @package chain/chain
 */

namespace _Chain_;
use _Chain_\Example\_AND_;

/**
 * @author Julien Tord <youlweb@hotmail.com>
 */
class _AND_Test extends \PHPUnit_Framework_TestCase
{
    public function testRun()
    {
        $AND_link = new _AND_();
        $IO = new IO(true, false);
        $AND_link->run($IO);
        $this->assertFalse($IO->I_(Type::BOOL));
        $AND_link->run($IO->_O(true, true));
        $this->assertTrue($IO->I_(Type::BOOL));
        $AND_link->run($IO->_O(false, false));
        $this->assertFalse($IO->I_(Type::BOOL));
    }
}
