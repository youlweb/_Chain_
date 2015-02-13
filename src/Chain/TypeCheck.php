<?php

/**
 * Chain ©2015 Julien Tord <youlweb@hotmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Chain;

use Jul\Chain\Exception\UnknownTypeException;

/**
 * Type check
 *
 * Chain uses predefined type constants for primitive types,
 * and FQCN strings to represent objects.
 *
 * @author Julien Tord <youlweb@hotmail.com>
 */
class TypeCheck implements Type
{
    /**
     * Matches return values of {@link http://php.net/manual/en/function.gettype.php PHP gettype()} with a constant.
     *
     * @var integer[]
     */
    public static $PHP = [
        'array' => self::MULTI,
        'boolean' => self::BOOL,
        'double' => self::NUMBER,
        'integer' => self::NUMBER,
        'NULL' => self::NULL,
        'resource' => self::RESOURCE,
        'string' => self::STRING
    ];

    public static $LITERAL = [
        self::BOOL => 'boolean',
        self::MULTI => 'array',
        self::NULL => 'NULL',
        self::NUMBER => 'number',
        self::RESOURCE => 'resource',
        self::STRING => 'string'
    ];

    /** {@inheritDoc} */
    public static function isCompatible($expected, $actual)
    {
        if ($expected === $actual) {
            return true;
        }
        if (is_integer($expected) || is_integer($actual)) {
            return false;
        }
        if (is_a($actual, $expected, true)) {
            return true;
        }
        return in_array($expected, class_implements($actual));
    }

    /** {@inheritDoc} */
    public static function isValid($type)
    {
        if (is_string($type)) {
            return class_exists($type);
        }
        return isset(self::$LITERAL[$type]);
    }

    /** {@inheritDoc} */
    public static function literal($type)
    {
        if (!self::isValid($type)) {
            throw new UnknownTypeException;
        }
        if (is_string($type)) {
            return $type;
        }
        return self::$LITERAL[$type];
    }

    /** {@inheritDoc} */
    public static function typeOf($value)
    {
        if (is_object($value)) {
            return get_class($value);
        }
        return self::$PHP[gettype($value)];
    }
}