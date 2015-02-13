<?php

/**
 * Chain ©2015 Julien Tord <youlweb@hotmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Chain;

use Jul\Chain\Exception\LinkTypeException;

/**
 * Chain
 *
 * @author Julien Tord <youlweb@hotmail.com>
 */
class Chain implements ChainInterface
{
    /**
     * @var LinkInterface[]
     */
    private $_links;

    /** {@inheritDoc} */
    public function exec(I_O_Interface $I_O)
    {
        foreach ($this->_links as $link) {
            if ($I_O->types() !== $link->types()) {
                throw new LinkTypeException($link);
            }
            $link->exec($I_O);
        }
        return $I_O;
    }

    /** {@inheritDoc} */
    public function get(I_O_Interface $I_O, $index = 0)
    {
        return $this->exec($I_O)->I_($index);
    }

    /** {@inheritDoc} */
    public function link(LinkInterface $link)
    {
        $this->_links[] = $link;
        return $this;
    }

    /** {@inheritDoc} */
    public function types()
    {
        if (!$this->_links) {
            return [];
        }
        return $this->_links[0]->types();
    }
}