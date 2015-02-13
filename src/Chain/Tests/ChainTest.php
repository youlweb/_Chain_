<?php

/**
 * Chain ©2015 Julien Tord <youlweb@hotmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Chain\Tests;

use Jul\Chain\Division;
use Jul\Chain\I_O;
use Jul\Chain\Chain;
use Jul\Chain\Square;

/**
 * @author Julien Tord <youlweb@hotmail.com>
 */
class ChainTest extends \PHPUnit_Framework_TestCase
{
    public function testGet()
    {
        $chain = new Chain();
        $chain->link(new Division())->link(new Square());

        $this->assertEquals(25, $chain->get(new I_O(15, 3)));
    }

    public function testDoubleChainForFun()
    {
        $chain1 = new Chain();
        $chain1->link(new Division())->link(new Square());
        $chain2 = new Chain();
        $chain2->link($chain1)->link(new Square());

        $this->assertEquals(625, $chain2->get(new I_O(15, 3)));
    }

    public function testExecThrowsExceptionIfIncompatibleTypes()
    {
        $this->setExpectedException('Jul\Chain\Exception\LinkTypeException');
        $chain = new Chain();
        $chain->link(new Square())->link(new Division());

        $this->assertEquals(25, $chain->exec(new I_O(15)));
    }
}
