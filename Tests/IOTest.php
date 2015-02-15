<?php

/**
 * _Chain_ ©2015 Julien <youlweb@hotmail.com>
 * Refer to the LICENSE file for the full copyright and license information.
 * @package chain/chain
 */

namespace _Chain_;

/**
 * @author Julien Tord <youlweb@hotmail.com>
 */
class IOTest extends \PHPUnit_Framework_TestCase
{
    public function testI_ReturnsNullIfUnavailableOptionalInput()
    {
        $IO = new IO('foo');
        $IO->I_(Type::STRING);
        $this->assertEquals(null, $IO->I_(Type::NUMBER, true));
    }

    public function testI_ReturnsSuccessiveInputsAndThrowsExceptionWhenDone()
    {
        $IO = new IO('foo', 77, [1, 2, 3]);
        $this->assertEquals('foo', $IO->I_(Type::STRING));
        $this->assertEquals(77, $IO->I_(Type::NUMBER));
        $this->assertEquals([1, 2, 3], $IO->I_(Type::MULTI));
        $this->setExpectedException('_Chain_\Exception\I_O_InputIndexException');
        $IO->I_(Type::BOOL);
    }

    public function testI_ThrowsTypeExceptionWhenUnexpectedTypeRequested()
    {
        $IO = new IO('foo');
        $this->setExpectedException('_Chain_\Exception\I_O_InputTypeException');
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

    public function test_O_ResetsIndex()
    {
        $IO = new IO('foo');
        $IO->I_(Type::STRING);
        $IO->_O('bar');
        $this->assertEquals('bar', $IO->I_(Type::STRING));
    }

    public function testProd()
    {
        $IO = new IO('foo');
        $IO->prod(true);
        $this->assertEquals('foo', $IO->I_(Type::BOOL));
    }
}
