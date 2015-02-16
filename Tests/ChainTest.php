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
        $chain_ = new Chain();
        $link_1 = $this->mockLink('lnk1');
        $link_2 = $this->mockLink('lnk2');
        $chain_->ADD($link_1);
        $this->assertEquals($link_1, $chain_->GET(0));
        $chain_->ADD($link_2);
        $this->assertEquals($link_2, $chain_->GET(1));
    }

    public function testADDWithOffset()
    {
        $chain_ = new Chain();
        $link_1 = $this->mockLink('lnk1');
        $link_2 = $this->mockLink('lnk2');
        $link_3 = $this->mockLink('lnk3');
        $chain_->ADD($link_1)->ADD($link_2)->ADD($link_3, 1);
        $this->assertEquals($link_3, $chain_->GET(1));
        $chain_->ADD($link_2, -3);
        $this->assertEquals($link_2, $chain_->GET(0));
    }

    public function testEXE()
    {
        $IO = $this->mockI_O('mockIO');
        $link_1 = $this->mockLink('lnk1');
        $link_1->expects($this->once())->method('EXE')->with($IO);
        $link_2 = $this->mockLink('lnk2');
        $link_2->expects($this->once())->method('EXE')->with($IO);
        $chain_ = new Chain();
        $chain_->ADD($link_1)->ADD($link_2);
        $this->assertEquals($IO, $chain_->EXE($IO));
    }

    public function testEXEBreaks()
    {
        $IO = $this->mockI_O('mockIO');
        $link_1 = $this->mockLink('lnk1');
        $link_1->expects($this->once())->method('EXE')->with($IO);
        $link_1->expects($this->once())->method('_X_')->willReturn(true);
        $link_2 = $this->mockLink('lnk2');
        $link_2->expects($this->never())->method('EXE');
        $chain_ = new Chain();
        $chain_->ADD($link_1)->ADD($link_2);
        $this->assertEquals($IO, $chain_->EXE($IO));
    }

    public function testGET()
    {
        $chain_ = new Chain();
        $link_1 = $this->mockLink('lnk1');
        $link_2 = $this->mockLink('lnk2');
        $chain_->ADD($link_1)->ADD($link_2);
        $this->assertEquals($link_1, $chain_->GET(0));
        $this->assertEquals($link_2, $chain_->GET(1));
        $this->assertNull($chain_->GET(2));
    }

    public function testCurrentKeyNextRewindValid()
    {
        $chain_ = new Chain();
        $link_1 = $this->mockLink('lnk1');
        $link_2 = $this->mockLink('lnk2');
        $chain_->ADD($link_1)->ADD($link_2);
        $this->assertEquals(0, $chain_->key());
        $this->assertTrue($chain_->valid());
        $this->assertEquals($link_1, $chain_->current());
        $chain_->next();
        $this->assertEquals(1, $chain_->key());
        $this->assertTrue($chain_->valid());
        $this->assertEquals($link_2, $chain_->current());
        $chain_->next();
        $this->assertFalse($chain_->valid());
        $chain_->rewind();
        $this->assertEquals(0, $chain_->key());
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
