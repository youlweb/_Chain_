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
class ChainImp implements Chain
{
    /**
     * @var Link[]
     */
    private $_links;

    /** {@inheritDoc} */
    public function exec(I_O $I_O)
    {
        foreach ($this->_links as $link) {
            $link->exec($I_O);
        }
        return $I_O;
    }

    /** {@inheritDoc} */
    public function link(Link $link)
    {
        $this->_links[] = $link;
        return $this;
    }

    /** {@inheritDoc} */
    public function result(I_O $I_O, $index = 0)
    {
        return $this->exec($I_O)->I_($index);
    }
}