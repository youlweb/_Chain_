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
        $_chain_ = new Chain();
        $_link_1 = $this->mockLink('lnk1');
        $_link_2 = $this->mockLink('lnk2');
        $_chain_->ADD($_link_1);
        $this->assertEquals($_link_1, $_chain_->GET(0));
        $_chain_->ADD($_link_2);
        $this->assertEquals($_link_2, $_chain_->GET(1));
    }

    public function testADDWithOffset()
    {
        $_chain_ = new Chain();
        $_link_1 = $this->mockLink('lnk1');
        $_link_2 = $this->mockLink('lnk2');
        $_link_3 = $this->mockLink('lnk3');
        $_chain_->ADD($_link_1)->ADD($_link_2)->ADD($_link_3, 1);
        $this->assertEquals($_link_3, $_chain_->GET(1));
        $_chain_->ADD($_link_2, -3);
        $this->assertEquals($_link_2, $_chain_->GET(0));
    }

    public function testEXE()
    {
        $I_O = $this->mockI_O('mockIO');
        $_link_1 = $this->mockLink('lnk1');
        $_link_1->expects($this->once())->method('EXE')->with($I_O);
        $_link_2 = $this->mockLink('lnk2');
        $_link_2->expects($this->once())->method('EXE')->with($I_O);
        $_chain_ = new Chain();
        $_chain_->ADD($_link_1)->ADD($_link_2);
        $this->assertEquals($I_O, $_chain_->EXE($I_O));
    }

    public function testEXEBreaks()
    {
        $I_O = $this->mockI_O('mockIO');
        $_link_1 = $this->mockLink('lnk1');
        $_link_1->expects($this->once())->method('EXE')->with($I_O);
        $_link_1->expects($this->once())->method('_X_')->willReturn(true);
        $_link_2 = $this->mockLink('lnk2');
        $_link_2->expects($this->never())->method('EXE');
        $_chain_ = new Chain();
        $_chain_->ADD($_link_1)->ADD($_link_2);
        $this->assertEquals($I_O, $_chain_->EXE($I_O));
    }

    public function testGET()
    {
        $_chain_ = new Chain();
        $_link_1 = $this->mockLink('lnk1');
        $_link_2 = $this->mockLink('lnk2');
        $_chain_->ADD($_link_1)->ADD($_link_2);
        $this->assertEquals($_link_1, $_chain_->GET(0));
        $this->assertEquals($_link_2, $_chain_->GET(1));
        $this->assertNull($_chain_->GET(2));
    }

    public function testCurrentKeyNextRewindValid()
    {
        $_chain_ = new Chain();
        $_link_1 = $this->mockLink('lnk1');
        $_link_2 = $this->mockLink('lnk2');
        $_chain_->ADD($_link_1)->ADD($_link_2);
        $this->assertEquals(0, $_chain_->key());
        $this->assertTrue($_chain_->valid());
        $this->assertEquals($_link_1, $_chain_->current());
        $_chain_->next();
        $this->assertEquals(1, $_chain_->key());
        $this->assertTrue($_chain_->valid());
        $this->assertEquals($_link_2, $_chain_->current());
        $_chain_->next();
        $this->assertFalse($_chain_->valid());
        $_chain_->rewind();
        $this->assertEquals(0, $_chain_->key());
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
