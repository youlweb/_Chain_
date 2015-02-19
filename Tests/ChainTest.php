<?php

/**
 * _Chain_ ©2015 Julien <youlweb@hotmail.com>
 * Refer to the LICENSE file for the full copyright and license information.
 * @package chain/core
 */

namespace _Chain_;

/**
 * @author Julien <youlweb@hotmail.com>
 */
class ChainTest extends \PHPUnit_Framework_TestCase
{
    public function testADD()
    {
        $chain = new Chain();
        $link_1 = $this->mockLink('lnk1');
        $link_2 = $this->mockLink('lnk2');
        $chain->ADD($link_1);
        $this->assertEquals($link_1, $chain->GET(0));
        $chain->ADD($link_2);
        $this->assertEquals($link_2, $chain->GET(1));
    }

    public function testADDWithOffset()
    {
        $chain = new Chain();
        $link_1 = $this->mockLink('lnk1');
        $link_2 = $this->mockLink('lnk2');
        $link_3 = $this->mockLink('lnk3');
        $chain->ADD($link_1)->ADD($link_2)->ADD($link_3, 1);
        $this->assertEquals($link_3, $chain->GET(1));
        $chain->ADD($link_2, -3);
        $this->assertEquals($link_2, $chain->GET(0));
    }

    public function testEXE()
    {
        $IO = $this->mockI_O('mockIO');
        $link_1 = $this->mockLink('lnk1');
        $link_1->expects($this->once())->method('EXE')->with($IO);
        $link_2 = $this->mockLink('lnk2');
        $link_2->expects($this->once())->method('EXE')->with($IO);
        $chain = new Chain();
        $chain->ADD($link_1)->ADD($link_2);
        $this->assertEquals($IO, $chain->EXE($IO));
    }

    public function testEXEBreaks()
    {
        $IO = $this->mockI_O('mockIO');
        $link_1 = $this->mockLink('lnk1');
        $link_1->expects($this->once())->method('EXE')->with($IO);
        $link_1->expects($this->once())->method('_X_')->willReturn(true);
        $link_2 = $this->mockLink('lnk2');
        $link_2->expects($this->never())->method('EXE');
        $chain = new Chain();
        $chain->ADD($link_1)->ADD($link_2);
        $this->assertEquals($IO, $chain->EXE($IO));
    }

    public function testGET()
    {
        $chain = new Chain();
        $link_1 = $this->mockLink('lnk1');
        $link_2 = $this->mockLink('lnk2');
        $chain->ADD($link_1)->ADD($link_2);
        $this->assertEquals($link_1, $chain->GET(0));
        $this->assertEquals($link_2, $chain->GET(1));
        $this->assertNull($chain->GET(2));
    }

    public function testCurrentKeyNextRewindValid()
    {
        $chain = new Chain();
        $link_1 = $this->mockLink('lnk1');
        $link_2 = $this->mockLink('lnk2');
        $chain->ADD($link_1)->ADD($link_2);
        $this->assertEquals(0, $chain->key());
        $this->assertTrue($chain->valid());
        $this->assertEquals($link_1, $chain->current());
        $chain->next();
        $this->assertEquals(1, $chain->key());
        $this->assertTrue($chain->valid());
        $this->assertEquals($link_2, $chain->current());
        $chain->next();
        $this->assertFalse($chain->valid());
        $chain->rewind();
        $this->assertEquals(0, $chain->key());
    }

    /**
     * @param string $name
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    private function mockI_O($name)
    {
        return $this->getMock('_Chain_\I_O', [], [], $name);
    }

    /**
     * @param string $name
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    private function mockLink($name)
    {
        return $this->getMock('_Chain_\_Link_', [], [], $name);
    }
}
