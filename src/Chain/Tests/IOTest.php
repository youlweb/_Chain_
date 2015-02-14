<?php

/**
 * Chain ©2015 Julien Tord <youlweb@hotmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Chain\Tests;

use Jul\Chain\IO;
use Jul\Chain\Type\Type;

/**
 * @author Julien Tord <youlweb@hotmail.com>
 */
class IOTest extends \PHPUnit_Framework_TestCase
{
    public function testI_ReturnsSuccessiveInputsAndThrowsExceptionWhenDone()
    {
        $IO = new IO('foo', 77, [1, 2, 3]);
        $this->assertEquals('foo', $IO->I_(Type::STRING));
        $this->assertEquals(77, $IO->I_(Type::NUMBER));
        $this->assertEquals([1, 2, 3], $IO->I_(Type::MULTI));
        $this->setExpectedException('Jul\Chain\Exception\I_O_InputIndexException');
        $IO->I_(Type::BOOL);
    }

    public function testI_ThrowsTypeExceptionWhenUnexpectedTypeRequested()
    {
        $IO = new IO('foo');
        $this->setExpectedException('Jul\Chain\Exception\I_O_InputTypeException');
        $IO->I_(Type::BOOL);
    }

    public function test_O()
    {
        $IO = new IO('foo');
        $IO->_O('bar', 77, [1, 2, 3]);
        $this->assertEquals('bar', $IO->I_(Type::STRING));
        $this->assertEquals(77, $IO->I_(Type::NUMBER));
        $this->assertEquals([1, 2, 3], $IO->I_(Type::MULTI));
    }
}
