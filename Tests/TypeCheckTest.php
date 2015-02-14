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
class TypeCheckTest extends \PHPUnit_Framework_TestCase
{
    public function testIsCompatibleObjects()
    {
        $this->assertTrue(TypeCheck::isCompatible('stdClass', 'stdClass'));
        $this->assertFalse(TypeCheck::isCompatible('stdClass', 'Exception'));
        // Type constant vs FQCN
        $this->assertFalse(TypeCheck::isCompatible(TypeCheck::BOOL, 'stdClass'));
        // Parent
        $this->assertTrue(TypeCheck::isCompatible('PHPUnit_Framework_TestCase', get_class($this)));
        // Interface
        $this->assertTrue(TypeCheck::isCompatible('_Chain_\Type', '_Chain_\TypeCheck'));
    }

    public function testIsCompatiblePrimitives()
    {
        $this->assertTrue(TypeCheck::isCompatible(TypeCheck::BOOL, TypeCheck::BOOL));
        $this->assertFalse(TypeCheck::isCompatible(TypeCheck::BOOL, TypeCheck::NUMBER));
    }

    public function testIsValid()
    {
        $this->assertTrue(TypeCheck::isValid(TypeCheck::BOOL));
        $this->assertFalse(TypeCheck::isValid(100));
        $this->assertTrue(TypeCheck::isValid('\stdClass'));
        $this->assertFalse(TypeCheck::isValid('FooBarBaz'));
    }

    public function testLiteral()
    {
        $this->assertEquals('boolean', TypeCheck::literal(TypeCheck::BOOL));
        $this->assertEquals('\stdClass', TypeCheck::literal('\stdClass'));
    }

    public function testLiteralThrowsExceptionIfUnknownType()
    {
        $this->setExpectedException('_Chain_\Exception\UnknownTypeException');
        TypeCheck::literal(100);
    }

    public function testTypeOf()
    {
        $this->assertEquals(TypeCheck::BOOL, TypeCheck::typeOf(true));
        $this->assertEquals(TypeCheck::MULTI, TypeCheck::typeOf([1, 2, 3]));
        $this->assertEquals(TypeCheck::NULL, TypeCheck::typeOf(null));
        $this->assertEquals(TypeCheck::NUMBER, TypeCheck::typeOf(-77));
        $this->assertEquals(TypeCheck::NUMBER, TypeCheck::typeOf(54.79));
        $this->assertEquals(TypeCheck::RESOURCE, TypeCheck::typeOf(fopen('//', 'r')));
        $this->assertEquals(TypeCheck::STRING, TypeCheck::typeOf('foo'));
    }
}
