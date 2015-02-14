<?php

/**
 * _Chain_ ©2015 Julien <youlweb@hotmail.com>
 * Refer to the LICENSE file for the full copyright and license information.
 * @package _chain_
 */

namespace _Chain_;
use _Chain_\Exception\UnknownTypeException;

/**
 * Enforce type safety between links.
 *
 * _Chain_ uses type constants for primitive types, and FQCN strings to represent
 * objects. Note that closures are cast as 'Closure' objects in PHP.
 *
 * @author Julien <youlweb@hotmail.com>
 */
class TypeCheck implements Type
{
    /**
     * Matches return values of {@link http://php.net/manual/en/function.gettype.php PHP gettype()} with a constant.
     *
     * @var integer[]
     */
    public static $PHP_LITERAL_TO_CONSTANT = [
        'array' => self::MULTI,
        'boolean' => self::BOOL,
        'double' => self::NUMBER,
        'integer' => self::NUMBER,
        'NULL' => self::NULL,
        'resource' => self::RESOURCE,
        'string' => self::STRING
    ];

    public static $CONSTANT_TO_PHP_LITERAL = [
        self::BOOL => 'boolean',
        self::MULTI => 'array',
        self::NULL => 'NULL',
        self::NUMBER => 'double',
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
        return isset(self::$CONSTANT_TO_PHP_LITERAL[$type]);
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
        return self::$CONSTANT_TO_PHP_LITERAL[$type];
    }

    /** {@inheritDoc} */
    public static function typeOf($value)
    {
        if (is_object($value)) {
            return get_class($value);
        }
        return self::$PHP_LITERAL_TO_CONSTANT[gettype($value)];
    }
}