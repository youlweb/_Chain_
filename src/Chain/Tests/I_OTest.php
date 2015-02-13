<?php

/**
 * Chain ©2015 Julien Tord <youlweb@hotmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Chain\Tests;

use Jul\Chain\I_O;
use Jul\Chain\Type;

/**
 * @author Julien Tord <youlweb@hotmail.com>
 */
class I_OTest extends \PHPUnit_Framework_TestCase
{
    public function testI_ThrowsExceptionIfUnknownIndex()
    {
        $this->setExpectedException('Jul\Chain\Exception\I_O_InputIndexException');
        $I_O = new I_O(1,2,3);
        $I_O->I_(9);
    }

    public function testType()
    {
        $I_O = new I_O(true, 5, 3.9, 'foo', [1], $this, null);
        $expected = [
            Type::BOOLEAN, Type::NUMERIC, Type::NUMERIC, Type::STRING, Type::ARRAYS, get_class(), Type::NULL
        ];
        $this->assertEquals($expected, $I_O->types());
    }
}