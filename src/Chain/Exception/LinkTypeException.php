<?php

/**
 * Chain ©2015 Julien Tord <youlweb@hotmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Chain\Exception;

use Exception;
use Jul\Chain\LinkInterface;

/**
 * Link type exception
 *
 * The I/O visitor provides incompatible input types to a link.
 *
 * @author Julien Tord <youlweb@hotmail.com>
 */
class LinkTypeException extends Exception
{
    /**
     * @param LinkInterface $link
     */
    public function __construct(LinkInterface $link)
    {
        $this->message = 'The link ' . get_class($link) . ' received incompatible input types from the I/O visitor.';
    }
}