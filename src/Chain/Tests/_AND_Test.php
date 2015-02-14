<?php

/**
 * Chain ©2015 Julien Tord <youlweb@hotmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Chain\Tests;

use Jul\Chain\_AND_;
use Jul\Chain\IO;
use Jul\Chain\Type\Type;

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
