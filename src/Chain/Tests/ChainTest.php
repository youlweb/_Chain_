<?php

/**
 * Chain ©2015 Julien Tord <youlweb@hotmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Chain\Tests;

use Jul\Chain\I_O;
use Jul\Chain\Chain;

/**
 * @author Julien Tord <youlweb@hotmail.com>
 */
class ChainTest extends \PHPUnit_Framework_TestCase
{
    public function testExec()
    {
        $I_O = new I_O(15, 3);
        $chain = new Chain('Jul\Chain\Division', 'Jul\Chain\Square');

        $this->assertEquals(25, $chain->getOutput($I_O));
    }
}
