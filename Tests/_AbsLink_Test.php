<?php

/**
 * _Chain_ ©2015 Julien <youlweb@hotmail.com>
 * Refer to the LICENSE file for the full copyright and license information.
 * @package chain/core
 */

namespace _Chain_;

/**
 * @author Julien Tord <youlweb@hotmail.com>
 */
class _AbsLink_Test extends \PHPUnit_Framework_TestCase
{
    public function test_X_()
    {
        $link = $this->getMockForAbstractClass('_Chain_\_AbsLink_');
        $this->assertFalse($link->_X_());
        $this->assertTrue($link->_X_(true));
    }
}
