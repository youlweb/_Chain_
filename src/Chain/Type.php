<?php

/**
 * Chain ©2015 Julien Tord <youlweb@hotmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Chain;

/**
 * Type
 *
 * @author Julien Tord <youlweb@hotmail.com>
 */
class Type
{
    const ARRAYS = 1;
    const BOOLEAN = 2;
    const NULL = 3;
    const NUMERIC = 4;
    const RESOURCE = 5;
    const STRING = 6;

    /**
     * Matches return values of {@link http://php.net/manual/en/function.gettype.php PHP gettype()} with a constant.
     *
     * @var integer[]
     */
    public static $PHP_TYPES = [
        'array' => self::ARRAYS,
        'boolean' => self::BOOLEAN,
        'double' => self::NUMERIC,
        'integer' => self::NUMERIC,
        'NULL' => self::NULL,
        'resource' => self::RESOURCE,
        'string' => self::STRING
    ];
}