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
class ChainTest extends \PHPUnit_Framework_TestCase
{
    public function test_LinkAndLinks()
    {
        $_chain_ = new Chain();
        $_link_1 = $this->mockLink('lnk1');
        $_link_2 = $this->mockLink('lnk2');
        $_chain_->_link($_link_1)->_link($_link_2);
        $this->assertEquals([$_link_1, $_link_2], $_chain_->links());
    }

    public function testLink_()
    {
        $_chain_ = new Chain();
        $_link_1 = $this->mockLink('lnk1');
        $_link_2 = $this->mockLink('lnk2');
        $_chain_->link_($_link_1)->link_($_link_2);
        $this->assertEquals([$_link_2, $_link_1], $_chain_->links());
    }

    public function testRun()
    {
        $I_O = $this->mockI_O('mockIO');
        $_link_1 = $this->mockLink('lnk1');
        $_link_1->expects($this->once())->method('run')->with($I_O);
        $_link_2 = $this->mockLink('lnk2');
        $_link_2->expects($this->once())->method('run')->with($I_O);
        $_chain_ = new Chain();
        $_chain_->_link($_link_1)->_link($_link_2);
        $this->assertEquals($I_O, $_chain_->run($I_O));
    }

    public function testRunHalts()
    {
        $I_O = $this->mockI_O('mockIO');
        $_link_1 = $this->mockLink('lnk1');
        $_link_1->expects($this->once())->method('run')->with($I_O);
        $_link_1->expects($this->once())->method('isHalt')->willReturn(true);
        $_link_2 = $this->mockLink('lnk2');
        $_link_2->expects($this->never())->method('run');
        $_chain_ = new Chain();
        $_chain_->_link($_link_1)->_link($_link_2);
        $this->assertEquals($I_O, $_chain_->run($I_O));
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
