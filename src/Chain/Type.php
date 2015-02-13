<?php

/**
 * Chain ©2015 Julien Tord <youlweb@hotmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Chain;

use Jul\Chain\Exception\TypeException;

/**
 * Type
 *
 * Chain uses predefined type constants for primitive types,
 * and FQCN strings to represent objects.
 *
 * @author Julien Tord <youlweb@hotmail.com>
 */
interface Type
{
    const BOOL = 1;
    const MULTI = 2;
    const NULL = 3;
    const NUMBER = 4;
    const RESOURCE = 5;
    const STRING = 6;

    /**
     * Checks if two types are compatible.
     *
     * Type validity is not enforced to enhance performance, however
     * mismatching FQCNs can return TRUE if $actual extends, or
     * implements $expected.
     *
     * @param int|string $expected Type constant or FQCN.
     * @param int|string $actual Type constant or FQCN.
     * @return bool
     */
    public static function isCompatible($expected, $actual);

    /**
     * Converts a type constant or FQCN to a literal type.
     *
     * @param int|string $type Type constant or FQCN.
     * @return string Literal type.
     * @throws TypeException A type constant or FQCN is not recognized.
     */
    public static function literal($type);

    /**
     * Returns a type constant or the FQCN.
     *
     * @param mixed $value Primitive or object to evaluate.
     * @return int|string Type constant or FQCN.
     */
    public static function typeOf($value);

    /**
     * Checks the validity of a type constant or FQCN.
     *
     * @param int|string $type Type constant or FQCN.
     * @return bool
     */
    public static function isValid($type);
}