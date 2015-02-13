<?php

/**
 * Chain ©2015 Julien Tord <youlweb@hotmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Jul\Chain;

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
}