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
class Chain
{
    private $_links;

    public function __construct()
    {
        $this->_links = func_get_args();
    }

    public function getOutput(I_O_Interface $I_O)
    {
        foreach ($this->_links as $link) {
            $link::exec($I_O);
        }
        return $I_O->I(0);
    }
}